<?php

namespace App\Models;

use App\Models\Purchase_invoice_item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'purchase_date',
        'brutto_value',
        'netto_value'
    ];

    public function purchase_invoice_item()
    {
        return $this->hasMany(Purchase_invoice_item::class);
    }
}
