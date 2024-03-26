<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'storageName'
    ];
    /**
     * Get all of the comments for the Storage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(StorageProduct::class);
    }
}
