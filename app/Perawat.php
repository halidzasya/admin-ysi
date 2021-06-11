<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = "perawat";
    protected $fillable = [
    	'nama_perawat','jadwal_id','jenis_kelamin', 'agama', 'nohp', 'tempatlahir', 'ttl', 'alamat',
         'domisili', 'email', 'status', 'statuskerja', 'pengalaman', 'fotoktp', 'sks'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

}
