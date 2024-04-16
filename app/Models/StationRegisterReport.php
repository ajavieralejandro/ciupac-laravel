<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StationRegisterReport extends Model
{
    protected $fillable = ['name','path','id','station_id'];
    use HasFactory;
}
