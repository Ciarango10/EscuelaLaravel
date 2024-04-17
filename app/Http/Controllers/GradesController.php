<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Enrollment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GradesController extends Controller
{
    public function index() {
        $grades = Grade::all();
        $enrollments = Enrollment::all();

        return view("grades.index", ['grades' => $grades, 'enrollments' => $enrollments]);
    }

    public function create() {
        $grades = Grade::all();
        $enrollments = Enrollment::all();

        return view("grades.create", ['$grades'=> $grades, 'enrollments' => $enrollments]);
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'grade' => 'required',
            'enrollment_id' => 'not_in:0',
        ],
        [
            'grade.required' => 'El grado es obligatorio.',
            'enrollment_id.not_in' => 'La matricula es requerida.'

        ])->validate();

        try {  
            $grade = new Grade();
            $grade->grade = $request->grade;
            $grade->enrollment_id = $request->enrollment_id;

            $grade->save();
    
            Session::flash('message', ['content' => 'Nota creada con éxito', 'type' => 'success']);
            return redirect()->action([GradesController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }
        
    }

    public function edit($id) {
        $grade = Grades::find($id);
        $enrollments = Enrollment::all();

        if(empty($grade)) {
            Session::flash('message', ['content' => "La nota con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([GradesController::class, 'index']);
        }

        $enrollmentSelected = Enrollment::find($grade->enrollment_id);
        if(empty($enrollmentSelected)){

            abort(404, "La matricula con id '$grade->enrollment_id)' no existe");
        }

        return view("grades.edit", ['grade' => $grade, 'enrollments' => $enrollments, 'enrollmentSelected' => $enrollmentSelected]);    }

    public function update(Request $request) {
    
        $validator = Validator::make($request->all(), [
            'grade_id' => 'required|numeric|min:1',
            'grade' => 'required',
            'enrollment_id' => 'not_in:0',
        ],
        [
            'grade_id.required' => 'El grade_id es obligatorio.',
            'grade_id.numeric' => 'El grade_id debe ser un número.',
            'grade_id.min' => 'El grade_id no puede ser menor a :min.',
            'grade.required' => 'El grado es obligatorio.',
            'enrollment_id.not_in' => 'La matricula es requerida.'

        ])->validate();

        try {
            $grade = Grade::find($request->grade_id);

            if (empty($grade)) {

                Session::flash('message', ['content' => "La nota con id '$request->grade_id' no existe", 'type' => 'error']);
                return redirect()->action([GradesController::class, 'index']);
            }

            $grade->grade_id = $request->grade_id;
            $grade->grade = $request->grade;
            $grade->enrollment_id = $request->enrollment_id;

            $grade->save();

            Session::flash('message', ['content' => 'Nota editada con éxito', 'type' => 'success']);
            return redirect()->action([GradesController::class, 'index']);

        } catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }

    public function delete($id) {

        try {
            $grade = Grade::find($id);

            if(empty($grade)) {
                Session::flash('message', ['content' => "La nota con id '$id' no existe", 'type' => 'error']);
            }

            $grade->delete();

            Session::flash('message', ['content' => 'Nota eliminada con éxito', 'type' => 'success']);
            return redirect()->action([GradesController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }
}
