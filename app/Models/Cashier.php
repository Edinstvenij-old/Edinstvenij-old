<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    use HasFactory;

    // Определяем, какие поля можно массово заполнять
    protected $fillable = [
        'name',
        'total_exchanges',
        'total_amount',
        'photo_url',
        'exchanger_id'
    ];

    // Определяем связь с моделью Exchanger
    /**
     * Get the exchanger that owns the cashier.
     */
    public function exchanger()
    {
        return $this->belongsTo(Exchanger::class);
    }
}
