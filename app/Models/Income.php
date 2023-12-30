<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'value',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
