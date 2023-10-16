<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Outlet_Model extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "outlet";

    protected $fillable = ['nama_outlet','alamat','telepon'];

    protected $dates = ['deleted_at'];
}
