<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiRelawan extends Model
{

    protected $table = "absensi_relawan";
    protected $fillable = [
    'id', 'tanggal', 'kehadiran','jam_masuk', 'jam_keluar', 'aktivitas'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'id','name');
    }

}
