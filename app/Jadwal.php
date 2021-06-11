<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal";
    protected $primaryKey = "id";
    protected $fillable = [
    'id','jadwal', 'jam_masuk', 'jam_keluar'
    ];
    // public function jadwalkerja()
    // {
    //     return $this->hasMany(\App\JadwalKerja::class);
    // }
    // public function relawan()
    // {
    //     return $this->belongsToMany(Relawan::class, 'jadwal_relawan', 'relawan_id', 'jadwal_id');
    // }
    // public function jadwal_relawan() {
    //     return $this->belongsTo(JadwalKerja::class,'jadwal_id');
    // }
    public function perawat()
    {
        return $this->hasMany(Perawat::class);
    }

}
