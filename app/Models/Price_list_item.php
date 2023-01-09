<?php

namespace App\Models;

use App\Models\Price_list;
use App\Models\Commoditie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price_list_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_number',
        'price',
        'commodity_code',
        'price_list_id',
    ];

    public function price_list()
    {
        return $this->belongsTo(Price_list::class);
    }

    public function commoditie()
    {
        return $this->belongsTo(Commoditie::class);
    }
}
