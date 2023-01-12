<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\ProgramAccreditation;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\FunctionController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InternationalController;
use App\Http\Controllers\InstitutionalController;
use App\Http\Controllers\QMSController;
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

//Front-end Route
Route::get('/',[AboutController::class, 'Quality_About']);

//Routes Calendar
Route::get('Quality-Assurance/Calendar', [FullCalenderController::class, 'calendar']);

Route::get('/Quality-Assurance/Program-Accreditaion/Status',[ProgramAccreditation::class, 'View_Program']);

//Routes for Gallery
Route::get('/Quality-Assurance/Gallery',[GalleryController::class, 'View_Gallery']);

//Routes for About Content
Route::get('/Quality-Assurance/',[AboutController::class, 'Quality_About']);

//Routes for Accreditation
Route::get('/Quality-Assurance/International-Accreditation',[InternationalController::class, 'International_accreditation']);
Route::get('/Quality-Assurance/Institutional-Accreditation',[InstitutionalController::class, 'Institutional_accreditation']);
Route::get('/Quality-Assurance/Quality-Management-System',[QMSController::class, 'Quality_Management_System']);
Route::get('/Quality-Assurance/Program-Accreditation',[ProgramAccreditation::class, 'Program_Accreditation']);


//Routes for Contact
Route::get('/Quality-Assurance/Contact',[ContactController::class, 'View_Contact']);

//Admin Route
Route::get('/auth/logout',[AccountController::class, 'logout'])->name('auth.logout');
Route::post('/auth/save',[AccountController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[AccountController::class, 'check'])->name('auth.check');

Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/mmsu/quality-assurance/admin',[AccountController::class, 'login'])->name('auth.login');
    Route::get('/auth/register',[AccountController::class, 'register'])->name('auth.register');

    Route::get('/admin/dashboard',[AccountController::class, 'dashboard']);
    //Admin Route for About
    Route::get('/Quality-Assurance/About/Add-About-Content',[AboutController::class, 'Add_Content']);
    Route::post('/Quality-Assurance/About/Save-About-Content',[AboutController::class, 'Save_Content']);
    

    //Admin Route for Program Accreditation
    Route::get('/Quality-Assurance/Program-Status/Add-Program',[ProgramAccreditation::class, 'Add_Program']);
    Route::post('/Quality-Assurance/Program-Status/Delete-Program',[ProgramAccreditation::class,'delete_program']);
    Route::post('/Quality-Assurance/Program-Status/Save-Program',[ProgramAccreditation::class, 'Save_Program']);
    Route::get('/Quality-Assurance/Program-Status/Edit-Program/{id}',[ProgramAccreditation::class, 'Edit_Program']);
    Route::post('/Quality-Assurance/Program-Status/Save-Edit-Program',[ProgramAccreditation::class, 'Save_Edit_Program']);
    Route::get('/Quality-Assurance/Program-Accreditation/Add-Program-Content',[ProgramAccreditation::class, 'Add_Content']);
    Route::post('/Quality-Assurance/Program-Accreditation/Save-Program-Accreditation',[ProgramAccreditation::class, 'Save_Content']);
    Route::get('/Quality-Assurance/Admin/Program-Accreditations',[ProgramAccreditation::class, 'Program_Accreditations']);

    //Route for Gallery
    Route::get('/Quality-Assurance/Gallery/Add-gallery',[GalleryController::class, 'Add_gallery']);
    Route::post('/Quality-Assurance/Gallery/Save-Gallery',[GalleryController::class, 'store']);
    Route::post('/Quality-Assurance/Gallery/Delete-Gallery',[GalleryController::class,'delete_gallery']);
    Route::get('/Quality-Assurance/Gallery/Edit-Gallery/{id}',[GalleryController::class, 'Edit_Gallery']);
    Route::put('/Quality-Assurance/Gallery/Save-Edit-Gallery/{id}',[GalleryController::class, 'Save_Edit_Gallery']);
    Route::get('/Quality-Assurance/Admin/Gallery',[GalleryController::class, 'Admin_Gallery']);

    //Routes for International Accreditation
    Route::get('/Quality-Assurance/International-Accreditation/Add-Accreditation-Content',[InternationalController::class, 'Add_Content']);
    Route::post('/Quality-Assurance/Accreditation/Save-International-Accreditation',[InternationalController::class, 'Save_Content']);
    Route::get('/Quality-Assurance/International-Accreditation/Add-status',[InternationalController::class, 'Add_status']);
    Route::post('/Quality-Assurance/International-Accreditation/Save-Status',[InternationalController::class, 'store']);
    Route::post('/Quality-Assurance/International-Accreditation/Delete-status',[InternationalController::class,'delete_status']);
    Route::get('/Quality-Assurance/International-Accreditation/Edit-Status/{id}',[InternationalController::class, 'Edit_Status']);
    Route::put('/Quality-Assurance/International-Accreditation/Save-Edit-Status/{id}',[InternationalController::class, 'Save_Edit_Status']);
    Route::get('/Quality-Assurance/Interantional/Add-Status-description',[InternationalController::class, 'Add_Description']);
    Route::post('/Quality-Assurance/International-Accreditation/Save-Description',[InternationalController::class, 'Save_Description']);
    Route::get('/Quality-Assurance/Admin/International-Accreditation',[InternationalController::class, 'International_accreditations']);

    //Routes for Institutional Accreditation
    Route::get('/Quality-Assurance/Institutional-Accreditation/Add-Accreditation-Content',[InstitutionalController::class, 'Add_Content']);
    Route::post('/Quality-Assurance/Accreditation/Save-Institutional-Accreditation',[InstitutionalController::class, 'Save_Content']);
    Route::get('/Quality-Assurance/Institutional-Accreditation/Add-Status-Content',[InstitutionalController::class, 'Add_Status']);
    Route::post('/Quality-Assurance/Accreditation/Save-Institutional-Status',[InstitutionalController::class, 'Save_Status']);
    Route::get('/Quality-Assurance/Admin/Institutional-Accreditation',[InstitutionalController::class, 'Institutional_accreditations']);

    //route for QMS
    Route::get('/Quality-Assurance/QMS/Add-QMS-Content',[QMSController::class, 'Add_Content']);
    Route::post('/Quality-Assurance/QMS/Save-QMS-Accreditation',[QMSController::class, 'Save_Content']);
    Route::get('/Quality-Assurance/Admin/Quality-Management-System',[QMSController::class, 'Quality_Management_Systems']);
    Route::get('/Quality-Assurance/QMS/Add-status',[QMSController::class, 'Add_status']);
    Route::post('/Quality-Assurance/QMS/Save-Status',[QMSController::class, 'store']);
    Route::post('/Quality-Assurance/QMS/Delete-status',[QMSController::class,'delete_status']);
    Route::get('/Quality-Assurance/QMS/Edit-Status/{id}',[QMSController::class, 'Edit_Status']);
    Route::put('/Quality-Assurance/QMS/Save-Edit-Status/{id}',[QMSController::class, 'Save_Edit_Status']);
    Route::get('/Quality-Assurance/QMS/Add-QMS-description',[QMSController::class, 'Add_Description']);
    Route::post('/Quality-Assurance/QMS/Save-Description',[QMSController::class, 'Save_Description']);

    //Route for Calendar
    Route::post('Quality-Assurance/Calendar/Save', [FullCalenderController::class, 'store'])->name('calendar.store');
    Route::patch('Quality-Assurance/Calendar/Update/{id}', [FullCalenderController::class, 'update'])->name('calendar.update');
    Route::delete('calendar/destroy/{id}', [FullCalenderController::class, 'destroy'])->name('calendar.destroy');
    Route::get('Quality-Assurance/Admin/Calendar', [FullCalenderController::class, 'calendars']);

    //Route for Contact
    Route::get('/Quality-Assurance/Contact/Add-Contact',[ContactController::class, 'Add_Contact']);
    Route::post('/Quality-Assurance/Contact/Save-About-Contact',[ContactController::class, 'Save_Contact']);



});
