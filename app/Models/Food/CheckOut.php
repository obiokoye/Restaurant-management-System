<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $table = "checkout";
    protected $fillable = [
        'name',
        'email',
        'town',
        'country',
        'zipcode',
        'phone',
        'address',
        'user_id',
        'price',
        'status', 



    ];

    public $timestamps = false;

}
