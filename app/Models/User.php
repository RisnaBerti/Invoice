<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //id nya id_user

    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'nama',
        'email',
        'password',
        'jabatan',
        'is_aktif',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    //relasi dengan tabel roles
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'id_user', 'id_role');
    }

    //fungsi untuk mengecek apakah user memiliki role tertentu atau tidak
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->roles->contains('nama_role', $role)) {
                    return true;
                }
            }
        } else {
            if ($this->roles->contains('nama_role', $roles)) {
                return true;
            }
        }
        return false;
    }

    //relasi dengan tabel pemasukan
    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_user', 'id_user');
    }

    //relasi dengan tabel pengeluaran
    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'id_user', 'id_user');
    }
}
