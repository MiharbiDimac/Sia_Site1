<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class UserCourse extends Model{
    protected $table = 'course';
    protected $primaryKey = 'CourseID';
    public $timestamps = false;
    // column sa table
     protected $fillable = [
        'CourseID', 'CourseName'
    ];
}