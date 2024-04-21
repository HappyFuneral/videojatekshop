<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OrderState extends Model
{
    use HasFactory;

    protected $fillable = [
        'state'
    ];

    public function orders(): BelongsToMany {
        return $this->belongsTo(Order::class);
    }
}
