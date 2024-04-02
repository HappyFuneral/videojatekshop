<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "price",
        "delivery_date",
        "delivery_details",
        "orderState_id"
    ];

    

    public function order_states(): HasOne {
        return $this->hasMany(OrderState::class);
    }
}
