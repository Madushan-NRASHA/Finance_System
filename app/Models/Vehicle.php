<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';

    protected $fillable = [
        'customer_id',
        'vehicle_type',
        'vehicle_no',
        'engine_no',
        'vehicle_book',
        'owner_type',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function customer()
    {
//        return $this->belongsTo(Customer::class);
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function instllement(){
        return $this->belongsTo(Installemnt::class, 'Customer_id');
    }
}
