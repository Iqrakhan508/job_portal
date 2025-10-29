<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class city extends Model
{
    use HasFactory;
    protected $table = 'city'; 
    protected $fillable = ['city_name', 'city_description', 'country_id', 'slug'];
    protected $primaryKey = 'city_id'; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($city) {
            if (empty($city->slug)) {
                $city->slug = Str::slug($city->city_name);
            }
        });

        static::updating(function ($city) {
            if ($city->isDirty('city_name') && empty($city->slug)) {
                $city->slug = Str::slug($city->city_name);
            }
        });
    }

    public function iqraKhan() {
        return $this->belongsTo(Country::class, 'country_id');   
    }

    public function jobs() {
        return $this->hasMany(Job::class, 'city_id', 'city_id');
    }
}
