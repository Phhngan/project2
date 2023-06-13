<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'vou_id';
    protected $fillable = [
        'vou_type',
        'vou_day',
        'vou_title',
        'vou_discount',
        'vou_image',
        'vou_detail',
        'vou_min'
    ];

    public function salesInvoice()
    {
        return $this->hasMany(Salesinvoice::class, 'vou_id', 'vou_id');
    }
}
