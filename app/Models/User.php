<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model{
    protected $table = 'stables';
    protected $primaryKey = 'Student_ID';
    public $timestamps = false;
    // column sa table
     protected $fillable = [
        'Student_ID', 'Student_Name', 'CourseID'
    ];
}