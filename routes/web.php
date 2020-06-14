<?php

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

Route::group(['middleware' => ['auth']], function () {
Route::post('create-new-account','TraineesController@validateUsersData');
Route::get('/dashboard','TraineesController@getAllTrainees')->name("Dashboard");
Route::get('/suspend-trainee/{id}','TraineesController@suspendTrainee');
Route::get('/approve-trainee/{id}','TraineesController@activateTrainee');
Route::get('/',function(){ return redirect('/dashboard');});
Route::get('/enrollment-form/{id}',function(){
    return view('admin_pages.enrollment_form');
})->name("Enrollment");
Route::get('/courses',function(){
    $all_courses = DB::table('courses')->get(); 
    return view('admin_pages.courses',compact('all_courses'));
})->name("Courses");
Route::get('export', 'TraineesController@export');
Route::get('/course-contents',function(){
    $course_contents = DB::table('content')->get();
    return view('admin_pages.course_contents',compact('course_contents'));
})->name("Course Content");
Route::get('/settings',function(){
    $all_users = DB::table('users')
    ->join('roles','users.role_id','users.id')
    ->select('users.name','users.email','roles.role','users.id')->get();
    $display_roles=DB::table('roles')->where('status','active')->get();
    return view('admin_pages.settings',compact('all_users','display_roles'));
})->name("Settings");
Route::get('/save-role','SettingsController@createRole');
Route::get('/display-permission-role/{id}','SettingsController@displayPermissionRole')->name('Permission Role');
Route::get('/display-role/{role_name}','SettingsController@displayRoles')->name('Roles');
Route::get('/display-checkboxes/{role_name}','SettingsController@displayCheckboxes')->name('Permission Checkboxes');
Route::get('/assign-permissions/{role_name}','SettingsController@assign_roles');
Route::get('unsign-permission/{id}','SettingsController@unSignPermission');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');