<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productstatus extends Model
{
    use HasFactory;
    protected $primaryKey = 'prd_status_id';
    protected $fillable = [
        'prd_status',
    ];

    public function importInvoiceDetail(){
        return $this->hasMany(Importinvoicedetail::class, 'prd_status_id', 'prd_status_id');
    }
}
