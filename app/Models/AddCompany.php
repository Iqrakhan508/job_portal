<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCompany extends Model
{
    use HasFactory;

    protected $table = 'ads_companies';

    protected $fillable = [
        'company_name',
        'code',
        'is_auto',
        'active'
    ];

    protected $casts = [
        'is_auto' => 'boolean',
        'active' => 'boolean'
    ];
}
