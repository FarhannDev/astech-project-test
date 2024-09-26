<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'type_id'];

  public function transactions()
  {
    return $this->hasMany(Transaction::class, 'category_id');
  }

  public function type()
  {
    return $this->belongsTo(TransactionType::class, 'type_id');
  }
}
