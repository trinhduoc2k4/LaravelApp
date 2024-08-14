<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price'
    ];
}
