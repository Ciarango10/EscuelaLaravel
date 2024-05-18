<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class RolesController extends Controller
{
    public function index(Request $request) {

        $filter = $request->filter;

        if(!empty($request->records_per_page)) {

            $request->records_per_page = $request->records_per_page <= env('PAGINATION_MAX_SIZE')
                                                                    ? $request->records_per_page
                                                                    :  env('PAGINATION_MAX_SIZE');
        } else {

            $request->records_per_page = env('PAGINATION_DEFAULT_SIZE');
        }

        $roles = Role::where('name', 'LIKE', "%$filter%")
                     ->paginate($request->records_per_page);

        return view('roles.index', ['roles' => $roles,
                                    'data' => $request]);

    }
    public function create() {

        $modules=Permission::all()->groupBy('module');
                            
        return view('roles.create', ['modules' => $modules]);
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'role_id' => 'required',
            'permission_id' => 'required',
        ],
        [
            'role_id.required' => 'El año académico es requerido.',
            'permission_id.required' => 'El estudiante es requerido.',
        ])->validate();

        try {  
            $role = new Role();
            $role->role_id = $request->role_id;
            $role->permission_id = $request->permission_id;

            $role->save();
    
            Session::flash('message', ['content' => 'Rol creado con éxito', 'type' => 'success']);
            return redirect()->action([RolesController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
        
    }

    public function edit($id) {
        
        $role = Role::find($id);

        if (empty($role)) {

            Session::flash('message', ['content' => "El rol con id '$id' no existe.", 'type' => 'error']);
            return redirect()->back();
        }

        $permissions = Permission::all();

        $permissions = $permissions->map(function($item) use($id) {

            $item->selected = false;

            $rolePermission = RolePermission::where('permission_id', '=', $item->id)
                                            ->where('role_id', '=', $id)
                                            ->first();

            if (!empty($rolePermission)) {

                $item->selected = true;
            }

            return $item;

        });

        $modules = $permissions->groupBy('module');

        return view('roles.edit', ['role' => $role, 'modules' => $modules]);
    }   
    
    public function update(Request $request) {
    
          // Validación de los datos recibidos en la solicitud
          $validator = Validator::make($request->all(), [
            'role_id' => 'required|exists:roles,id',
            'permission_id' => 'required|exists:permissions,id',
        ],
        [
            'role_id.required' => 'El id del rol es requerido.',
            'role_id.exists' => 'El id dado para el rol no existe',
            'permission_id.required' => 'El id del permiso es requerido.',
            'permission_id.exists' => 'El id dado para el permiso no existe',

        ])->validate();


        try {
            $role = Role::find($request->role_id);
            $role->role_id = $request->role_id;
            $role->permission_id = $request->permission_id;

            $role->save();

            Session::flash('message', ['content' => 'Rol actualizado con éxito', 'type' => 'success']);
            return redirect()->action([RolesController::class, 'index']);
    

        } catch(Exception $ex) {
        
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();

        }

    }
    public function delete($id) {

        try {
            $role = Role::find($id);

            if(empty($role)) {
                Session::flash('message', ['content' => "El rol con id '$id' no existe", 'type' => 'error']);
            }

            $role->delete();

            Session::flash('message', ['content' => 'Rol eliminado con éxito', 'type' => 'success']);
            return redirect()->action([RolesController::class, 'index']);
        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }

}