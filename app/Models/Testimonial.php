<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * Casting the model value
     * 
     * @var array
     */
    protected $casts = [
        'social' => 'array',
    ];

    /**
     * Fillable property of the model
     * 
     * @var array
     */
    protected $fillable = ['name', 'profile', 'description', 'social', 'status'];
}
