<?php

namespace App\Models;

use App\Models\Commoditie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement_unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_shortcut',
        'name'
    ];

    public function commoditie()
    {
        return $this->hasMany(Commoditie::class);
    }
}
