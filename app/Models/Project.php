<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ["created_at", "deleted_at", "updated_at"];
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
