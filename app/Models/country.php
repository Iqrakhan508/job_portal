<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
     protected $table = 'country'; 
      protected $fillable = ['country_name'];
    protected $primaryKey = 'country_id';   // Laravel ko batana hota hai ke kis column ko use kare as primary key.

    public function cityName() {
        return $this->hasMany(City::class, 'country_id');   //hasMany relationship mean 1 country have multiple cities
    }    


}
