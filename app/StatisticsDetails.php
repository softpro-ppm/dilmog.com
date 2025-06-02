<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatisticsDetails extends Model
{
    protected $fillable = [
        'total_delivery', 'total_customers', 'total_years', 'total_member', 'is_active'
    ];
    protected $table = 'statistics_details';
}
