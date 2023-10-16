<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member_Model extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "member";

    protected $fillable = ['id','nama_member','alamat','jenis_kelamin','telepon'];

    protected $dates = ['deleted_at'];
}
