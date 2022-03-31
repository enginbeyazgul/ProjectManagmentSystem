<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Report extends Model
{
    use HasFactory;
    protected $table = "Project_Report";
    protected $fillable=["project_report_id","project_idea_id","status_no","date_stamp","pdf_file_path_1","pdf_file_path_2","pdf_file_path_3","doc_file_path_1","doc_file_path_2","doc_file_path_3","rejection_note"];
    public $timestamps=false;
}
