<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "user_id",
        "price",
        "delivery_date",
        "delivery_details",
        "postal",
        "country",
        "province",
        "city",
        "address",
        "orderState_id",
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function users(): HasOne {
        return $this->hasOne(User::class);
    }

    public function order_states(): HasOne {
        return $this->hasOne(OrderState::class);
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class);
    }
}
