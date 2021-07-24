<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $table = 'short_url';

    protected $fillable = [
        'short_string',
        'origin_url',
        'created_at',
        'updated_at',
    ];
}
