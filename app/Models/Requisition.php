<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    use HasFactory;

    public function requisitionCountry(){
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
    public function requisitionCategory()
    {
        return $this->belongsTo('App\Models\RequisitionCategory', 'category_id');
    }
    public function worker()
    {
        return $this->belongsTo('App\Models\Worker', 'worker_id');
    }
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
