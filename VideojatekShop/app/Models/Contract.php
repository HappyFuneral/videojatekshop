<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = 
    [
        "contract_name",
        "contract_owner",
        "pdf",
        "contract_type_id"
    ];

    public function contract_types(): HasOne {
        return $this->hasOne(ContractType::class);
    }

    
}
