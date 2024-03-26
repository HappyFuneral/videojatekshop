<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Storage;

class StorageProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'count',
        'product_id',
        'storage_id'
    ];

    /**
     * Get the user that owns the StorageProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function storage(): BelongsTo
    {
        return $this->belongsTo(Storage::class);
    }

    /**
     * Get the user that owns the StorageProduct
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}

