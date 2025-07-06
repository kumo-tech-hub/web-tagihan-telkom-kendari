<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'account_manager_id',
        'produk_id',
        'start_date',
        'end_date',
        'paid_status',
    ];
}