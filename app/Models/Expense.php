<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function income(){
        $this->hasOne(Income::class);
    }

    public function bill(){
        $this->hasOne(Bill::class);
    }
}
