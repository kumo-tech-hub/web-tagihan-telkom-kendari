<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'company_name',
        'phone_number',
        'address',
        'city',
        'district',
        'email',
        'type',
        'status',
    ];

    public function contactPeople()
    {
        return $this->hasMany(CustomerContactPerson::class, 'customer_id');
    }
}
