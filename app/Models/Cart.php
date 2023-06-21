<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'car_id';
    protected $fillable = [
        'use_id',
        'prd_id',
        'car_quantity',
        'ship_id',
        'sal_detailAddress',
        'car_note',
        'vou_id',
        'car_gold'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'ship_id');
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'vou_id', 'vou_id');
    }
}
