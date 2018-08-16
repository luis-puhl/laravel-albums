<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'cover_photo',
        'released_at',
    ];

    protected $dates = [
        'released_at',
    ];

    protected $appends = [
        'year',
    ];

    public function getYearAttribute()
    {
        $relase = $this->attributes['released_at'];
        if (is_a($relase, Carbon::class)) {
            return $relase->year;
        }
        return $this->attributes['released_at'];
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
