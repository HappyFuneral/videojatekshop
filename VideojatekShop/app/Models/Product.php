<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'title',
        'product_img',
        'product_type_id',
        'description',
        'price',
        'publisher_id',
        'releaseDate'
    ];
    
    public function product_types(): HasOne {
        return $this->hasOne(ProductType::class);
    }

    public function publishers(): HasOne {
        return $this->hasOne(Publisher::class);
    }

    public function storages(): BelongsToMany {
        return $this->belongsToMany(Storages::class);
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }

}
