<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerContactPerson extends Model
{
    protected $table = 'customer_contact_person';

    protected $fillable = [
        'customer_id',
        'first_name',
        'last_name',
        'no_ktp',
        'phone_number',
        'email',
        'address',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
