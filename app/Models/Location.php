<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'id'
    ];
    use HasFactory;
    public function asambleas()
    {
        return $this->hasMany(Asamblea::class);
    }
}
