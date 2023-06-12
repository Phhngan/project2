<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Importinvoicedetail extends Model
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

    public function importInvoice()
    {
        return $this->belongsTo(Importinvoice::class, 'imp_id', 'imp_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'prd_id', 'prd_id');
    }
}
