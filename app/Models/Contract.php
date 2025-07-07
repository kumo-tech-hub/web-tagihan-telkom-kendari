<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_number',
        'company_id',
        'account_manager_id',
        'produk_id',
        'start_date',
        'end_date',
        'paid_status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function accountManager()
    {
        return $this->belongsTo(AccountManager::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Generate unique contract number
    public static function generateContractNumber()
    {
        do {
            $randomNumber = mt_rand(100000, 999999);
            $contractNumber = 'cont/' . $randomNumber;
        } while (self::where('contract_number', $contractNumber)->exists());

        return $contractNumber;
    }

    // Auto-generate contract number when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($contract) {
            if (empty($contract->contract_number)) {
                $contract->contract_number = self::generateContractNumber();
            }
        });
    }
}