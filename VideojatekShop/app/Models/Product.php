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
        'code',
        'product_img',
        'product_type_id',
        'description',
        'price',
        'tariff_number',
        'tariff_description',
        'publisher_id',
        'platform_id',
        'releaseDate',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function product_types(): HasOne {
        return $this->hasOne(ProductType::class);
    }

    public function publishers(): HasOne {
        return $this->hasOne(Publisher::class);
    }

    public function paltforms(): HasOne {
        return $this->hasOne(Publisher::class);
    }

    public function storages(): BelongsToMany {
        return $this->belongsToMany(Storage::class);
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
    public static function productQuantity($id) : int{
        $quantity = 0;
        foreach(StorageProduct::all() as $storageProduct){
            if ($storageProduct->product_id == $id){
                $quantity+=$storageProduct->quantity;
            }
        }
        return $quantity;
    }

}
