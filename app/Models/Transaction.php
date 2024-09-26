<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'category_id',
        'amount',
        'transaction_date'
    ];


    public function type()
    {
        return $this->belongsTo(TransactionType::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class, 'category_id');
    }
}
