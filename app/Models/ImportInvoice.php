<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportInvoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'imp_id';
    protected $fillable = [
        'unit_id',
        'use_id',
        'imp_date',
        'imp_total',
    ];

    public function supplyUnit(){
        return $this->belongsTo(SupplyUnit::class, 'unit_id', 'unit_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'use_id', 'id');
    }

    public function importInvoiceDetail(){
        return $this->hasMany(ImportInvoiceDetail::class, 'imp_id', 'imp_id');
    }
}
