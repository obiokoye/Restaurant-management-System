<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = "foods";
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category',
        'description',
        'image',


    ];

    public $timestamps = false;
}
