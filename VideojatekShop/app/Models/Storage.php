<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Storage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'storageName',
        'postal',
        'country',
        'province',
        'city',
        'address',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function storage_products(): BelongsToMany
    {
        return $this->belongsToMany(StorageProduct::class);
    }
}
