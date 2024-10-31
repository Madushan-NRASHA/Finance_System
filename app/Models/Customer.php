<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $fillable = [
        'name',
        'address',
        'contact',
        'nic',
        'agreement_no',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class, 'customer_id');
    }
}
