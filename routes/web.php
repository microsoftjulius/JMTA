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
Route::get('/add-new-course',function(){
    return view('admin_pages.add_course_form');
});
Route::post('/create-new-course','CoursesController@validateCourse');
Route::post('create-new-account','TraineesController@validateUsersData');
Route::get('/dashboard','TraineesController@getAllTrainees')->name("Dashboard");
Route::get('/suspend-trainee/{id}','TraineesController@suspendTrainee');
Route::get('/approve-trainee/{id}','TraineesController@activateTrainee');
Route::get('/',function(){ return redirect('/dashboard');});
Route::get('/enrollment-form/{id}',function($id){
    $course_name = DB::table('courses')->where('id',$id)->value('course_name');
    return view('admin_pages.enrollment_form',compact('course_name'));
})->name("Enrollment");
Route::get('/courses',function(){
    $all_courses = DB::table('courses')->get(); 
    return view('admin_pages.courses',compact('all_courses'));
})->name("Courses");
Route::get('export', 'TraineesController@export');
Route::get('/course-contents/{id}',function($id){
    $course_contents = DB::table('content')->get();
    $get_first_video = DB::table('content')->where('content.id',$id)->join('courses','courses.id','content.course_id')->get();
    $get_second_video = DB::table('content')->where('id',($id+1))->get();
    $get_other_videos = DB::table('content')->where('id','>',$id+1)->get();
    return view('admin_pages.course_contents',compact('course_contents','get_first_video','get_second_video','get_other_videos'));
})->name("Course Content");
Route::get('/settings',function(){
    $all_users = DB::table('users')
    ->join('roles','users.role_id','roles.id')
    ->select('users.name','users.email','roles.role','users.id')->get();
    return view('admin_pages.settings',compact('all_users'));
})->name("Settings");
Route::get('/user-and-roles/{id}', function($id){
    
    $display_roles=DB::table('users')->join('roles','users.role_id','roles.id')->where('users.id',$id)->get();
    return $display_roles;
});
Route::get('/save-role','SettingsController@createRole');
Route::get('/display-permission-role/{id}','SettingsController@displayPermissionRole')->name('Permission Role');
Route::get('/display-user-and-roles/{id}','SettingsController@displayUserAndRoles')->name('user and Roles');
Route::get('/display-role/{role_name}','SettingsController@displayRoles')->name('Roles');
Route::get('/display-checkboxes/{role_name}','SettingsController@displayCheckboxes')->name('Permission Checkboxes');
Route::get('/assign-permissions/{role_name}','SettingsController@assign_roles');
Route::get('unsign-permission/{id}','SettingsController@unSignPermission');
Route::get('/update-role','SettingsController@updateRole');
Route::get('/assign-roles/{id}','SettingsController@updateRole');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');