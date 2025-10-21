<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    protected $table = 'city'; 
    protected $fillable = ['city_name','country_id'];
    protected $primaryKey = 'city_id'; 

    public function iqraKhan() {
        return $this->belongsTo(Country::class, 'country_id');   
    }
}
