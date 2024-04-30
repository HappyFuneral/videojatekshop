<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StorageProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'stock',
        'product_id',
        'storage_id'
    ];

    public function storages(): HasOne
    {
        return $this->hasOne(Storage::class);
    }

    public function products(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}

