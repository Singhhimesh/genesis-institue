<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * Fillable property of the model.
     * 
     * @var array
     */
    protected $fillable = ['key', 'value'];
}
