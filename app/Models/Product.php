<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'price',
        'description',
        'image',
    ];

    protected $hidden;

    public function pesanan()
    {
        return $this->hasOne(Payment::class, 'users_id');
    }
}
