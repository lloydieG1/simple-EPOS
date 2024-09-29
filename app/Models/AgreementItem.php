<?php

namespace App\Models;

use App\Models\Agreement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'agreement_id',
        'name',
        'description',
        'quantity',
        'cost_price',
        'retail_price',
    ];

    // agreement item must have a user
    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }


}
