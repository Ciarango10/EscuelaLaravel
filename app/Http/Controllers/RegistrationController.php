<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    // Método para mostrar el formulario de creación de matrícula
    public function create()
    {
        return view('registration.create');
    }

    // Método para almacenar una nueva matrícula
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:50',
            'email_address' => 'required|email|unique:registrations,email_address',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|max:90',
            'home_address' => 'required|max:25',
            'phone_number' => 'required|max:25',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {  
            $registration = new Registration();
            $registration->full_name = $request->full_name;
            $registration->email_address = $request->email_address;
            $registration->birth_date = $request->birth_date;
            $registration->gender = $request->gender;
            $registration->address = $request->address;
            $registration->home_address = $request->home_address;
            $registration->phone_number = $request->phone_number;
            $registration->save();
    
            Session::flash('message', ['content' => 'Matrícula creada con éxito', 'type' => 'success']);
            return redirect()->route('Registration.index');

        } catch(Exception $ex) {
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }

    // Método para mostrar el formulario de edición de matrícula
    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view('registration.edit', compact('registration'));
    }

    // Método para actualizar una matrícula existente
    public function update(Request $request, $id)
    {
        $registration = Registration::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:50',
            'email_address' => 'required|email|unique:registrations,email_address,'.$registration->id,
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|max:90',
            'home_address' => 'required|max:25',
            'phone_number' => 'required|max:25',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {  
            $registration->full_name = $request->full_name;
            $registration->email_address = $request->email_address;
            $registration->birth_date = $request->birth_date;
            $registration->gender = $request->gender;
            $registration->address = $request->address;
            $registration->home_address = $request->home_address;
            $registration->phone_number = $request->phone_number;
            $registration->save();
    
            Session::flash('message', ['content' => 'Matrícula actualizada con éxito', 'type' => 'success']);
            return redirect()->route('Registration.index');

        } catch(Exception $ex) {
            Log::error($ex);
            Session::flash('message', ['content' => 'Ha ocurrido un error', 'type' => 'error']);
            return redirect()->back();
        }
    }

    // Método para eliminar una matrícula
    public function delete($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();
        Session::flash('message', ['content' => 'Matrícula eliminada con éxito', 'type' => 'success']);
        return redirect()->route('Registration.index');
    }
}

