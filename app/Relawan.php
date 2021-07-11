<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{
    protected $table = "relawan";
    protected $fillable = [
    	'id','nama', 'jk', 'agama', 'nohp', 'tempatlahir',  'ttl', 'domisili', 'alamat', 'status'
    ];
    public function rating()
    {
        return $this->hasOne(Rating::class, 'relawan_id');
    }
    public function user()
    {
        return $this->hasMany(AbsensiRelawan::class);
    }
    // public function jadwalkerja()
    // {
    //     return $this->hasMany(\App\JadwalKerja::class);
    // }

    // public function jadwal_relawan() {
    //     return $this->hasMany('App\JadwalKerja');
    // }
    // public function jadwal()
    // {
    //     return $this->belongsTo(Jadwal::class);
    // }
    // public function jadwalkerja()
    // {
    //     return $this->hasMany(JadwalKerja::class);
    // }
    // public function jadwal_shift()
    // {
    //     return $this->hasMany(JadwalShift::class, 'id_relawan');
    // }
}
