<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'income_id',
        'bill_id'
    ];

    public function income(){
        return $this->belongsTo(Income::class);
    }

    public function bill(){
        return $this->belongsTo(Bill::class);
    }
}
