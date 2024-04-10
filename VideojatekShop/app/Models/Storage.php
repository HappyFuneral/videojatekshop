<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Storage extends Model
{
    use HasFactory;

    protected $fillable = [
        'storageName',
        'postal',
        'country',
        'province',
        'city',
        'address'
    ];
    
    public function storage_products(): BelongsToMany
    {
        return $this->belongsToMany(StorageProduct::class);
    }
}
