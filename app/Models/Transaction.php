<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'name',
        'amount',
        'destination_name',
        'destination_number',
        'description',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }
}
