<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';

    protected $fillable = [
        'id_mitra',
        'nama_mitra',
        'alamat_mitra',
        'no_telp_mitra',
        'email_mitra',
        'jenis_mitra'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id_mitra', 'id_mitra');
    }
}
