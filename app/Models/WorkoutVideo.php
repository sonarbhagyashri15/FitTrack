<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutVideo extends Model
{
    protected $fillable = [

        'title',

        'category',

        'youtube_url',

        'description'

    ];
}