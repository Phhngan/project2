<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    use HasFactory;
    protected $primaryKey = 'prd_type_id';
    protected $fillable = [
        'prd_type',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'prd_type_id', 'prd_type_id');
    }
}
