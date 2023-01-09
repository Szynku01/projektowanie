<?php

namespace App\Models;

use App\Models\Sales_invoice;
use App\Models\Commoditie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_invoice_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'invoice_number_id',
        'quantity',
        'unit_price',
        'brutto_price',
        'netto_price',
        'VAT_rate',
        'commodity_code'
    ];

    public function sales_invoice()
    {
        return $this->belongsTo(Sales_invoice::class);
    }

    public function commoditie()
    {
        return $this->belongsTo(Commoditie::class);
    }
}
