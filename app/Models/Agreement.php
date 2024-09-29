<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_forename',
        'customer_surname',
        'customer_date_of_birth',
        'created_by',
    ];

    // agreement must have a user
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // agreement may have many items
    public function agreementItems()
    {
        return $this->hasMany(AgreementItem::class);
    }
}
