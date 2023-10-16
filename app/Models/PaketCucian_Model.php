<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketCucian_Model extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "v_paket";

    protected $fillable = ['id_outlet','nama_outlet','jenis','nama_paket','harga'];

    protected $dates = ['deleted_at'];
}
