<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name',
        'img',
        'product_type_id',
        'description',
        'price',
        'publisher_id',
        'releaseDate'
    ];
    
    
}
