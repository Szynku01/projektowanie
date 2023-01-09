<?php

namespace App\Models;

use App\Models\Price_list_item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_list_number',
        'date_from',
        'date_to'
    ];

    public function price_list_item()
    {
        return $this->hasMany(Price_list_item::class);
    }
}
