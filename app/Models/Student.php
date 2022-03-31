<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "Student";
    protected $fillable=["student_no","name","surname","class","phone","user_id","teacher_no","department_id","faculty_id","student_picture_path"];
    public $timestamps=false;
}
