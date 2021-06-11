<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    public $fillable = ['relawan_id', 'rating'];
    public function relawan()
    {
        return $this->belongsTo(Relawan::class);
    }
}
