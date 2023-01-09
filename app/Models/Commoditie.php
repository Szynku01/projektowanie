<?php

namespace App\Models;

use App\Models\Measurement_unit;
use App\Models\Sales_invoice_item;
use App\Models\Purchase_invoice_item;
use App\Models\Price_list_item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commoditie extends Model
{
    use HasFactory;

    protected $fillable = [
        'commodity_code',
        'commodity_name',
        'unit_shortcut'
    ];

    public function measurement_unit() 
    {
        return $this->belongsTo(Measurement_unit::class);
    }

    public function sales_invoice_item()
    {
        return $this->hasMany(Sales_invoice_item::class);
    }

    public function purchase_invoice_item()
    {
        return $this->hasMany(Purchase_invoice_item::class);
    }

    public function price_lise_item()
    {
        return $this->hasMany(Price_list_item::class);
    }
}
