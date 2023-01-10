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
        'pro_id',
        'sal_district',
        'sal_town',
        'sal_detailAddress'
    ];

    public function product(){
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function province(){
        return $this->belongsTo(Province::class, 'pro_id', 'pro_id');
    }
}
