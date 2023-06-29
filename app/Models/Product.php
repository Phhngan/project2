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
        'prd_description',
        'prd_image'
    ];

    public function importInvoiceDetail()
    {
        return $this->hasMany(Importinvoicedetail::class, 'prd_id', 'prd_id');
    }

    public function salesInvoiceDetail()
    {
        return $this->hasMany(Salesinvoicedetail::class, 'prd_id', 'prd_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'prd_id', 'prd_id');
    }

    public function image()
    {
        return $this->hasMany(Image::class, 'prd_id', 'prd_id');
    }
    public function favoriteProduct()
    {
        return $this->hasMany(Favoriteproduct::class, 'prd_id', 'prd_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'prd_id', 'prd_id');
    }
}
