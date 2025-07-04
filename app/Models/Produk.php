<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'produk';
    protected $fillable = [
        'name',
        'price',
        'description',
        'status',
    ];
}
