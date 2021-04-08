<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteEvaluation extends Model
{
    use HasFactory;
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'worker_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
