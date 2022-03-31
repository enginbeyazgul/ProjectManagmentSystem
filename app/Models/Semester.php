<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = "Semester";
    protected $fillable=["semester_id","system_admin_id","semester_name","is_active"];
    public $timestamps=false;
}
