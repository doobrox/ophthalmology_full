<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;

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

//Route::get('/', function () {
//    return view('layouts.app');
//});

//Route::get('/', [PagesController::class, 'index']);

//TEST ROUTES
//Route::get('/add_statement_sheet', [PagesController::class, 'add_statement_sheet']);
//Route::get('/see_crystalline', [PagesController::class, 'see_crystalline']);
//
//Route::get('/patients_info', [PagesController::class, 'patients_info']);
//
//Route::get('/reception', [PagesController::class, 'reception']);
//

// urmatoarele 2 pentru datatable edis si view user
Route::get('user/{user}', function ($id) {
    return view('pages.patients_details',['id' => $id]);
})->name('users.show');

Route::get('user/{user}/edit', function ($id) {
    return view('pages.patients_edit',['id' => $id]);
})->name('users.edit');

// ar fi frumos daca am pune sub group .. receptie/add_cons .. da nu stiu daca e ok :D incaa


Route::get('add_consultatie/{id}', function ($id) {
    return view('pages.add_consultatie',['id' => $id]);
})->name('add.consultation')->middleware('auth');

Route::get('add_consultatie/add_plata/{id}', function ($id) {
    return view('pages.add_plata',['id' => $id]);
})->name('add.expense')->middleware('auth');

Route::get('add_consultatie/add_ochelari/{id}', function ($id) {
    return view('pages.add_ochelari',['id' => $id]);
})->name('add.glasses')->middleware('auth');

Route::get('add_ochelari/{id}', function ($id) {
    return view('pages.add_ochelari',['id' => $id]);
})->name('add.assistant_glasses')->middleware('auth');

Route::get('/lista_proceduri', [PagesController::class, 'lista_proceduri'])->name('lista_proceduri')->middleware('auth');
Route::get('/add_procedura', [PagesController::class, 'add_procedura'])->middleware('auth');
Route::get('/asociere_proceduri', [PagesController::class, 'asociere_proceduri'])->middleware('auth');

Route::get('edit_procedura/{id}', function ($id) {
    return view('pages.edit_procedura',['id' => $id]);
})->name('edit.procedure')->middleware('auth');

Route::get('/lista_articole', [PagesController::class, 'lista_articole'])->name('lista_articole')->middleware('auth');

Route::get('/add_articol', [PagesController::class, 'add_articol'])->middleware('auth');

Route::get('add_reteta/{id}', function ($id) {
    return view('pages.add_reteta',['id' => $id]);
})->name('add.recipe')->middleware('auth');

Route::get('edit_articol/{id}', function ($id) {
    return view('pages.edit_articol',['id' => $id]);
})->name('edit.article')->middleware('auth');


Route::get('/lista_biomicroscopie', [PagesController::class, 'lista_biomicroscopie'])->name('lista_biomicroscopie')->middleware('auth');

Route::get('/add_biomicroscopie', [PagesController::class, 'add_biomicroscopie'])->middleware('auth');

Route::get('edit_biomicroscopie/{id}', function ($id) {
    return view('pages.edit_biomicroscopie',['id' => $id]);
})->name('edit.biomicroscopie')->middleware('auth');

Route::get('/lista_campuri_vizuale', [PagesController::class, 'lista_campuri_vizuale'])->name('lista_campuri_vizuale')->middleware('auth');

Route::get('/add_camp_vizual', [PagesController::class, 'add_camp_vizual'])->middleware('auth');

Route::get('edit_camp_vizual/{id}', function ($id) {
    return view('pages.edit_camp_vizual',['id' => $id]);
})->name('edit.visual_field')->middleware('auth');

Route::get('/lista_fo', [PagesController::class, 'lista_fo'])->name('lista_fo')->middleware('auth');

Route::get('/add_fo', [PagesController::class, 'add_fo'])->middleware('auth');

Route::get('edit_fo/{id}', function ($id) {
    return view('pages.edit_fo',['id' => $id]);
})->name('edit.eye_bottom')->middleware('auth');

Route::get('/lista_gonioscopie', [PagesController::class, 'lista_gonioscopie'])->name('lista_gonioscopie')->middleware('auth');

Route::get('/add_gonioscopie', [PagesController::class, 'add_gonioscopie'])->middleware('auth');

Route::get('edit_gonioscopie/{id}', function ($id) {
    return view('pages.edit_gonioscopie',['id' => $id]);
})->name('edit.gonioscopie')->middleware('auth');

Route::get('/lista_medicamente', [PagesController::class, 'lista_medicamente'])->name('lista_medicamente')->middleware('auth');

Route::get('/add_medicament', [PagesController::class, 'add_medicament'])->middleware('auth');

Route::get('edit_medicament/{id}', function ($id) {
    return view('pages.edit_medicament',['id' => $id]);
})->name('edit.drug')->middleware('auth');

Route::get('/lista_motive', [PagesController::class, 'lista_motive'])->name('lista_motive')->middleware('auth');

Route::get('/add_motiv', [PagesController::class, 'add_motiv'])->middleware('auth');

Route::get('edit_motiv/{id}', function ($id) {
    return view('pages.edit_motiv',['id' => $id]);
})->name('edit.reason')->middleware('auth');

Route::get('/lista_schema_tratamente', [PagesController::class, 'lista_schema_tratamente'])->name('lista_schema_tratamente')->middleware('auth');

Route::get('/add_schema_tratament', [PagesController::class, 'add_schema_tratament'])->middleware('auth');

Route::get('edit_schema_tratament/{id}', function ($id) {
    return view('pages.edit_schema_tratament',['id' => $id]);
})->name('edit.treatment_scheme')->middleware('auth');

Route::get('/lista_diagnostice', [PagesController::class, 'lista_diagnostice'])->name('lista_diagnostice')->middleware('auth');

Route::get('/add_diagnostic', [PagesController::class, 'add_diagnostic'])->middleware('auth');

Route::get('edit_diagnostic/{id}', function ($id) {
    return view('pages.edit_diagnostic',['id' => $id]);
})->name('edit.diagnostic')->middleware('auth');

Route::get('pacient_plata/{id}', function ($id) {
    return view('pages.pacient_plata',['id' => $id]);
})->name('pay.pacient')->middleware('auth');

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher')->middleware('auth');

Route::get('/logout', [PagesController::class, 'logout'])->name('logout');
Route::get('/register', [PagesController::class, 'register'])->name('register');
Route::get('/welcome', [PagesController::class, 'welcome'])->name('welcome');

Route::redirect('/', '/login');

Auth::routes(['register' => false]);



Route::get('/medic', [PagesController::class, 'medic'])->middleware('auth')->name('medic');
Route::get('/asistenta', [PagesController::class, 'asistenta'])->middleware('auth')->name('asistenta');
Route::get('/receptie', [PagesController::class, 'receptie'])->middleware('auth')->name('receptie');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

});


/* get PDF information */
Route::group(['prefix' => 'pdf', 'middleware' => ['auth']], function () {
    Route::get('/consultatie/{id}', [PdfController::class, 'consultatie']);
    Route::get('/consultatie_copie/{id}', [PdfController::class, 'consultatie_copie']);
    Route::get('/acord_pacient_covid19/{fk_patient_id}', [PdfController::class, 'acord_pacient_covid19']);
});

