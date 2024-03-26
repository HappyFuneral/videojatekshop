<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contract;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the comments for the Publisher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}
