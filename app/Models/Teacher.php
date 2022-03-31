<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "Teacher";
    protected $fillable=["teacher_no","user_id","department_id","name","surname","title"];
    public $timestamps=false;
}
