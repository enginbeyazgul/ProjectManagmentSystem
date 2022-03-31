<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Idea extends Model
{
    use HasFactory;
    protected $table = "Project_Idea";
    protected $fillable=["project_idea_id","keywords_id","project_title","project_description","research_description","status_no","student_no","teacher_no","date_stamp","semester_id","rejection_note"];
    public $timestamps=false;
}
