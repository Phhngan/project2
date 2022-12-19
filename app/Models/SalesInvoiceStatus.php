<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesInvoiceStatus extends Model
{
    use HasFactory;
    protected $primaryKey = 'sal_status_id';
    protected $fillable = [
        'sal_status',
    ];

    public function salesInvoice(){
        return $this->hasMany(SalesInvoice::class, 'sal_status_id', 'sal_status_id');
    }
}
