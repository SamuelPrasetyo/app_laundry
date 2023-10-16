<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateUser_Model extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "users";

    protected $fillable = ['id','name','email','password','role'];

    protected $dates = ['deleted_at'];
}
