<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Thesis extends Model
{
    use HasFactory;
    protected $table = "Project_Thesis";
    protected $fillable=["project_thesis_id ","project_report_id","date_stamp","status_no","pdf_file_path","doc_file_path","rejection_note"];
    public $timestamps=false;
}
