<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesinvoicedetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'sal_id',
        'prd_id',
        'sal_quantity',
        'sal_price',
        'imp_price'
    ];

    public function salesInvoice()
    {
        return $this->belongsTo(Salesinvoice::class, 'sal_id', 'sal_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }
}
