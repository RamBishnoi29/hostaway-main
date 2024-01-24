<?php

namespace App\Models\Hostaway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostawayBedroom extends Model
{
    use HasFactory;
    protected $casts = [
        'bed_data' => 'array',
    ];
}
