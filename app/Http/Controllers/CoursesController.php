<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Courses;

class CoursesController extends Controller
{
    protected function validateCourse(){
        if(empty(request()->course_name)){
            return redirect()->back()->withErrors("Please add the Course name");
        }
        if(empty(request()->course_image)){
            return redirect()->back()->withErrors("Please add an image to continue");
        }
        if(empty(request()->course_desc)){
            return redirect()->back()->withErrors("Please Enter a course description to continue");
        }else{
            return $this->createCourse();
        }
    }

    protected function createCourse(){
        $course_content = request()->course_image;
        $content_original_name = $course_content->getClientOriginalName();
        $course_content->move('course_banners/',$content_original_name);

        $course = new Courses();
        $course->course_name  = request()->course_name;
        $course->course_desc  = request()->course_desc;
        $course->course_image = $content_original_name;
        $course->save();
        return redirect()->back()->with('message','A new course has been created');
    }
}
