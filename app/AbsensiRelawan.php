<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiRelawan extends Model
{

    protected $table = "absensi_relawan";
    protected $fillable = [
     'user_id','tanggal', 'kehadiran','jam_masuk', 'jam_keluar', 'aktivitas'
    ];
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
}
