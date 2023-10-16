<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi_Model extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "transaksi";

    protected $fillable = ['id', 'id_outlet', 'kode_invoice', 'id_member', 'tanggal', 
                        'batas_waktu', 'tanggal_bayar', 'biaya_tambahan', 'diskon', 'pajak', 
                        'status', 'dibayar', 'id_user'];

    protected $dates = ['deleted_at'];
}
