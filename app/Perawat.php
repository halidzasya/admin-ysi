<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    protected $table = "perawat";
    protected $fillable = [
    	'nama_perawat','jadwal_id','jeniskelamin', 'agama', 'nohp', 'tempatlahir', 'ttl', 'alamat',
         'domisili',  'status', 'statuskerja', 'pengalaman', 'fotoktp', 'sks'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }

}
