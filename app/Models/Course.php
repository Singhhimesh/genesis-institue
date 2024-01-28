<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    
    /**
     *  Fillable property for the model 
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'bg',
        'description',
        'duration',
        'status',
        'sort_description',
    ];
}
