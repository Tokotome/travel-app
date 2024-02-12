<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'destination', 'category', 'has_pool', 'has_fitness'];
}
