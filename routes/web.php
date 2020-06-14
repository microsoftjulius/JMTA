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
    $all_users = DB::table('users')->get();
    return view('admin_pages.settings',compact('all_users'));
})->name("Settings");
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');