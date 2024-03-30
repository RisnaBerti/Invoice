<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $fillable = [
        'id_pengeluaran',
        'id_user',
        'tgl_pengeluaran'
    ];

    // public function mitra() {
    //     return $this->belongsTo(Mitra::class, 'id_mitra', 'id_mitra');
    // }

    public function detailPengeluaran() {
        return $this->hasMany(DetailPengeluaran::class, 'id_pengeluaran', 'id_pengeluaran');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
