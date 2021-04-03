<?php

use App\Http\Controllers\ClinicalHistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QueryController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('patients', PatientController::class);
    Route::put('updateAntecedentes/{id}', [PatientController::class, 'updateAntecedentes'])->name('patients.updateAntecedentes');

    Route::resource('queries', QueryController::class)->except('create');
    Route::get('queriescreate/{id}', [QueryController::class, 'create'])->name('queries.create');

    Route::resource('clinicalhistories', ClinicalHistoryController::class)->except('create');
    Route::get('clinicalhistorycreate/{id}', [ClinicalHistoryController::class, 'create'])->name('clinicalhistory.create');
});

require __DIR__ . '/auth.php';
