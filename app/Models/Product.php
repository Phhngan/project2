<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'prd_id';
    protected $fillable = [
        'prd_code',
        'prd_name',
        'prd_type_id',
        'prd_weigh',
        'prd_source',
        'prd_price',
        'prd_discount',
        'prd_description'
    ];

    public function productType(){
        return $this->belongsTo(ProductType::class, 'prd_type_id', 'prd_type_id');
    }

    public function importInvoiceDetail(){
        return $this->hasMany(ImportInvoiceDetail::class, 'prd_id', 'prd_id');
    }
    
    public function salesInvoiceDetail(){
        return $this->hasMany(SalesInvoiceDetail::class, 'prd_id', 'prd_id');
    }
}
