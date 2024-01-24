<?php

namespace App\Models\Hostaway;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostawayListing extends Model
{
    use HasFactory;
    protected $fillable=['title','no_of_bedrooms','no_of_bathrooms','size'];
}
