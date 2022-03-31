<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = "User";
    protected $fillable=["user_id","user_group_id","email","password"];

    public $timestamps=false;
}
