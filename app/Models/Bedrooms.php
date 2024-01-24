<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedrooms extends Model
{
    use HasFactory;
    protected $casts = [
        'bed_data' => 'array',
    ];
}
