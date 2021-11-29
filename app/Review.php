<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = [
        'name', 'email', 'comment','rating_star', 'product_name'
    ];
}
