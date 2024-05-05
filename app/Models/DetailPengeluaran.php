<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengeluaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pengeluaran';
    protected $primaryKey = 'id_detail_pengeluaran';
    protected $fillable = [
        'id_pengeluaran',
        'nama_barang_keluar',
        'jumlah_barang_keluar',
        'harga_satuan',
        'subtotal',
        'total'
    ];


    public function pengeluaran() {
        return $this->belongsTo(Pengeluaran::class, 'id_pengeluaran', 'id_pengeluaran');
    }
}
