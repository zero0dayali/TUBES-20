<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
}
