<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basura extends Model
{
    protected $fillable = [];
    public function localidad()
    {
        return $this->belongsTo('App\Models\Location', 'localidad_id');
    }
    use HasFactory;
}
