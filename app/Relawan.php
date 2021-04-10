<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relawan extends Model
{

    protected $table = "relawan";
    protected $fillable = [
    	'nama', 'email', 'status'
    ];
}
