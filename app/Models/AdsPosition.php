<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPosition extends Model
{
    use HasFactory;

    protected $table = 'ads_position';

    protected $fillable = [
        'ads_position',
        'ads_company',
        'ads_code'
    ];
}
