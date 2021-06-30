<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeManagementPlan extends Model
{
    use HasFactory;

    public function mobilizations()
    {
        return $this->hasMany(Mobilization::class);
    }
    public function siteEvaluations()
    {
        return $this->hasMany( SiteEvaluation::class);
    }
    public function siteClearances()
    {
        return $this->hasMany(SiteClearance::class);
    }
}
