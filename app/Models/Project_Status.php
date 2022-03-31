<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Status extends Model
{
    use HasFactory;
    protected $table = "Project_Status";
    protected $fillable=["status_no","status_description"];
    public $timestamps=false;
}
