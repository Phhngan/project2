<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesinvoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'sal_id';
    protected $fillable = [
        'use_id',
        'sal_date',
        'sal_total',
        'pro_id',
        'sal_district',
        'sal_town',
        'sal_detailAddress',
        'sal_status_id',
        'sal_note',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function province(){
        return $this->belongsTo(Province::class, 'pro_id', 'pro_id');
    }

    public function salesInvoiceStatus(){
        return $this->belongsTo(Salesinvoicestatus::class, 'sal_status_id', 'sal_status_id');
    }

    public function salesInvoiceDetail(){
        return $this->hasMany(Salesinvoicedetail::class, 'sal_id', 'sal_id');
    }
}


