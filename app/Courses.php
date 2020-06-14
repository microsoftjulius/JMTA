<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table = "courses";

    protected $fillable = ['course_name','course_desc','status','course_image'];
}
