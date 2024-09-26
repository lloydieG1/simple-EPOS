<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'agreement_id',
        'item_id',
        'name',
        'description',
        'quantity',
        'price',
        'total',
    ];

    // agreement item must have a user
    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }


}
