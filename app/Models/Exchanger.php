<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchanger extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'balance'];

    // Определяем связь с моделью Cashier
    /**
     * Get the cashiers for the exchanger.
     */
    public function cashiers()
    {
        return $this->hasMany(Cashier::class);
    }
}
