<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'duration',
        'composer',
        'order_number',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
