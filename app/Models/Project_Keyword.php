<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_Keyword extends Model
{
    use HasFactory;
    protected $table = "Project_Keyword";
    protected $fillable=["Keywords_id ","keyword1","keyword2","keyword3","keyword4","keyword5"];
    public $timestamps=false;
}
