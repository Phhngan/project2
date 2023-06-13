<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    protected $primaryKey = 'ship_id';
    protected $fillable = [
        'ship_price',
        'ship_extra',
        'ship_time'
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'ship_id', 'ship_id');
    }
    public function salesInvoice()
    {
        return $this->hasMany(Salesinvoice::class, 'ship_id', 'ship_id');
    }
}
