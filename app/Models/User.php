<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    
    // Matikan timestamps default Laravel jika hanya menggunakan created_at dari DB
    public $timestamps = false;

    // Tambahkan field baru sesuai form
    protected $fillable = [
        'full_name',
        'birth_date',       // Tanggal Lahir
        'phone_number',     // Nomor WhatsApp
        'password',         // Password
        'address',          // Alamat Lengkap
        'province',         // Provinsi
        'city',             // Kota/Kabupaten
        'district',         // Kecamatan
        'postal_code',      // Kode Pos
        'livestock_type',   // Jenis Ternak
        'population',       // Populasi Ternak
        'created_at'
    ];

    /**
     * Relasi ke Device (Satu user bisa memiliki banyak device)
     */
    public function devices()
    {
        return $this->hasMany(Device::class, 'owned_by', 'user_id');
    }
}