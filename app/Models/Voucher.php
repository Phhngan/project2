<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'vou_id';
    protected $fillable = [
        'vou_day',
        'vou_title',
        'vou_discount',
        'vou_image',
        'vou_min'
    ];

    public function salesInvoice()
    {
        return $this->hasMany(Salesinvoice::class, 'vou_id', 'vou_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'vou_id', 'vou_id');
    }
}
