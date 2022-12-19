<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportInvoiceDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'imp_id',
        'prd_id',
        'imp_quantity',
        'imp_price',
        'imp_expiryDate',
        'prd_status_id',
        'imp_quantity_left',
    ];

    public function importInvoice(){
        return $this->belongsTo(ImportInvoice::class, 'imp_id', 'imp_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }

    public function productStatus(){
        return $this->belongsTo(ProductStatus::class, 'prd_status_id', 'prd_status_id');
    }
}
