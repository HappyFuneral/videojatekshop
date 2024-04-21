<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasOne;
use Illuminate\Database\Eloquent\Relation\BelongsToMany;

class Order extends Model
{
    use HasFactory;

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
        "orderState_id"
    ];

    public function users(): HasOne {
        return $this->hasOne(User::class);
    }

    public function order_states(): HasOne {
        return $this->hasOne(OrderState::class);
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Produt::class);
    }
}
