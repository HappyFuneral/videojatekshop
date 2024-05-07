<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderState extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'state',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class);
    }
}
