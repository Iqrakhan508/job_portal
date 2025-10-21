<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'user_email',
        'user_password',
        'user_phone_no',
        'user_address',
        'country_id',
        'city_id',
        'user_status',
    ];
    protected $primaryKey = 'user_id';


     public function countryNAME() {
        return $this->belongsTo(country::class, 'country_id');
    }

     public function cityNAME() {
        return $this->belongsTo(city::class, 'city_id');
    }


      // Mutator: save hone se pehle format change
    public function setUserNameAttribute($value)
    {
        $this->attributes['user_name'] = ucfirst(strtolower($value));
    }

    // Accessor: read hone par format change
    public function getUserNameAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    
}
