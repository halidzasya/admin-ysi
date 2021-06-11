<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalKerja extends Model
{
    protected $table = 'jadwalkerja';
    protected $fillable = [

    	'id_relawan', 'nama_jadwal'
    ];
    // public function jadwal() {
    //     return $this->belongsTo(\App\Jadwal::class,'jadwal_id');
    // }
    // public function relawan() {
    //     return $this->belongsTo(App\Relawan::class);
    // }
    public function jadwalkerja()
    {
        return $this->belongsTo(jadwal_kerja::class);
    }
}
