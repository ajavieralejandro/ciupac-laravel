<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public function asamblea()
    {
        return $this->belongsTo('App\Models\Asamblea');
    }
    

}
