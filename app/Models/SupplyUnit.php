<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplyunit extends Model
{
    use HasFactory;
    protected $primaryKey = 'unit_id';
    protected $fillable = [
        'unit_code',
        'unit_name',
        'unit_email',
        'unit_phone',
    ];

    public function importInvoice()
    {
        return $this->hasMany(Importinvoice::class, 'unit_id', 'unit_id');
    }
}
