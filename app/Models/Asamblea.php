<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asamblea extends Model
{
    use HasFactory;
    public function location()
{
    return $this->belongsTo('App\Models\Location');
}
public function imagenes()
    {
        return $this->hasMany(ImagenAsamblea::class);
    }
}
