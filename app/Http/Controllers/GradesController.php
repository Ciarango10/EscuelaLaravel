<?php

namespace App\Http\Controllers;
use App\Models\Grade;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GradesController extends Controller
{
    public function index() {
        $grades = Grade::all();
        $subjects = Subject::all();

        return view("grades.index", ['grades' => $grades, 'subjects' => $subjects]);
    }

    public function create() {
        $grades = Grade::all();
        $subjects = Subject::all();

        return view("grades.create", ['subjects' => $subjects]);
    }

    public function store(Request $request) {

        // Validación de los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|max:25',
            'grade' => 'required',
            'subject_id' => 'not_in:0',
        ],
        [
            'student_name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            'grade.required' => 'El grado es obligatorio.',
            'subject_id.not_in' => 'La asignatura es requerida.'

        ])->validate();

        try {  
            $grade = new Grade();
            $grade->name = $request->name;
            $grade->grade = $request->grade;
            $grade->subject_id = $request->subject_id;

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
        $subjects = Subject::all();

        if(empty($grade)) {
            Session::flash('message', ['content' => "La nota con id '$id' no existe", 'type' => 'error']);
            return redirect()->action([GradesController::class, 'index']);
        }

        $subjectSelected = Subject::find($grade->subject_id);
        if(empty($subjectSelected)){

            abort(404, "La asignatura con id '$grade->subject_id)' no existe");
        }

        return view("grades.edit", ['grade' => $grade, 'subjetcs' => $subjects]);    }

    public function update(Request $request) {
    
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|max:25',
            'grade' => 'required',
            'subject_id' => 'not_in:0',
        ],
        [
            'student_name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede ser mayor a :max caracteres.',
            'grade.required' => 'El grado es obligatorio.',
            'subject_id.not_in' => 'La asignatura es requerida.'

        ])->validate();

        try {
            $grade = Grade::find($request->grade_id);

            if (empty($grade)) {

                Session::flash('message', ['content' => "La nota con id '$request->grade_id' no existe", 'type' => 'error']);
                return redirect()->action([GradesController::class, 'index']);
            }

            $subject->name = $request->name;
            $subject->grade = $request->grade;
            $subject->subject_id = $request->subject_id;

            $subject->save();

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

            $subject->delete();

            Session::flash('message', ['content' => 'Nota eliminada con éxito', 'type' => 'success']);
            return redirect()->action([SubjectsController::class, 'index']);

        }catch(Exception $ex) {

            Log::error($ex);
            Session::flash('message', ['content' => "Ha ocurrido un error", 'type' => 'error']);
            return redirect()->back();
        }

    }
}
