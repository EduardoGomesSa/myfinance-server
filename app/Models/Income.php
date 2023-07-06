<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo(User::class);
    }

    public function expenses(){
        $this->hasMany(Expense::class);
    }
}