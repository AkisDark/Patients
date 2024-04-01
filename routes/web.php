<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Patients\PatientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patient/{patient_id}', [PatientController::class, 'show'])->name('pat');

//
Route::post('create-traitement', [PatientController::class, 'store'])->name('pat.store');
