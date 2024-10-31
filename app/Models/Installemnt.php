<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installemnt extends Model
{
    use HasFactory;

    protected $table = 'installment';

    protected $fillable = [
        'customer_id',
        'full_amount',
        'down_amount',
        'lease_amount',
        'document_charge',
        'full_lease_amount',
        'duration',
        'rate',
        'monthly_rental',
    ];

    protected $casts = [
        'full_amount' => 'decimal:2',
        'down_amount' => 'decimal:2',
        'lease_amount' => 'decimal:2',
        'document_charge' => 'decimal:2',
        'full_lease_amount' => 'decimal:2',
        'rate' => 'decimal:2',
        'monthly_rental' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class, 'customer_id');
    }
}
