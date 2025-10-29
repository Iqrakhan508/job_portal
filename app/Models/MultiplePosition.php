<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiplePosition extends Model
{
    use HasFactory;

    protected $table = 'multiple_position';

    protected $fillable = [
        'ads_position_name'
    ];
}
