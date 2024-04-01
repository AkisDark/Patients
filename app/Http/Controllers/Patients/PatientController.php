<?php

namespace App\Http\Controllers\Patients;



use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    //
    public function index()
    {
        //
        //$doctorId = auth()->user()->id;
        //
        $patients = User::where('type', 2)->get();
        return view('patients.index', compact('patients'));
    }

    public function show($paitentId)
    {

        $patients = User::where('id', $paitentId)->with('traitments')->get();
        $patientsForSelect = User::where('type', 2)->get();
        //
        if (!empty($patients)) {
            return view('patients.profile', compact('patients', 'patientsForSelect'));
        }
        return redirect('/patients');
    }

    public function store(Request $request)
    { 
        $request->validate([
            'paitent_id' => ['required', 'integer', 'exists:users,id']
        ]);
 
    }
}
