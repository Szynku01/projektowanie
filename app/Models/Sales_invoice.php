<?php

namespace App\Models;

use App\Models\Sales_invoice_item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_invoice extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'invoice_number',
        'sale_date',
        'brutto_value',
        'netto_value'
    ];

    public function sales_invoice_item()
    {
        return $this->hasMany(Sales_invoice_item::class);
    }
}
