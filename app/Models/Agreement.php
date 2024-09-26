<?php

namespace App\Models;

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
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    // agreement may have many items
    public function AgreementItems()
    {
        return $this->hasMany(Item::class);
    }
}
