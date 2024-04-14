<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher ::all();
       return view('teachers.index',['teachers'->$teachers]);
    }
    
    public function create()
    {
        return view('teachers.create');

    }
    
    public function store(Request $request)
    {
        try{
            $teacher = new Teacher();
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;

            $teacher->save();
            return redirect()->action([TeachersController::class, 'index']);

        }catch(Exception $ex){
            Log:error($ex);
        }
    }

    public function edit()
    {
        $teacher = Teacher::find($id);

        if(empty($teacher))
        {
            
            abort(404,"El profesor con id '$id' no existe");
        }


        return view('Teachers.edit', ['teacher' => $teacher]);

    }
    
    public function update(Request $request)
    {
        try{
            $teacher = Teacher::find($request->teacher_id);
            
            if(empty($teacher)){
            
                abort(404,"El profesor con '$request->teacher_id' no existe");
            }

            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;

            $teacher->save();
            return redirect()->action([TeachersController::class, 'index']);

        }catch(Exception $ex){
            Log:error($ex);
        }
    }
    public function delete($id)
    {
        $teacher = Teacher::find($id);

        if(empty($teacher)){
            
            abort(404,"El profesor con id '$id' no existe");
        }
        $teacher->delete();

        return redirect()->action([TeachersController::class, 'index']);
    }
}
