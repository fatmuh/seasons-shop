<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = [
        'users_id',
        'product_id',
        'order_pcs',
        'price_total',
        'order_time',
        'type_of_payment',
        'proof_of_payment',
        'status',
        'notes',
    ];

    protected $hidden;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(Users::class, 'users_id', 'id');
    }
}
