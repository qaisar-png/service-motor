<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $fillable = ['nama_lengkap', 'no_hp', 'alamat', 'pekerjaan'];

    public function daftarServices() { return $this->hasMany(DaftarService::class, 'id_pelanggan'); }
}
