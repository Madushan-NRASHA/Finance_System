<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;
    protected $table = 'guarantor';

    protected $fillable = [
        'customer_id',
        'guarantor1_name',
        'guarantor1_address',
        'guarantor1_nic',
        'guarantor1_contact',
        'guarantor2_name',
        'guarantor2_address',
        'guarantor2_nic',
        'guarantor2_contact',
        'guarantor3_name',
        'guarantor3_address',
        'guarantor3_nic',
        'guarantor3_contact',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
