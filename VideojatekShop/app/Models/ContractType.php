<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "name",
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function contracts(): BelongsToMany {
        return $this->belongsToMany(Contract::class);
    }
}
