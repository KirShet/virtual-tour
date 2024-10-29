<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
    ];
    
    /**
     * 
     * @return
     */
    public function hasSpace()
    {
        return $this->animals()->count() < $this->capacity;
    }

    public function animals(){
        return $this->hasMany(Animal::class);
    }

}
