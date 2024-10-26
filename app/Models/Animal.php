<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'species',
        'name',
        'age',
        'description',
        'cade_id'
    ];

    public function cage(){
        return $this->belongsTo(Cage::class);
    }
}
