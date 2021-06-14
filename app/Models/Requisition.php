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

    public function unit()
    {
//        return $this->belongsTo(Unit::class);
        return $this->belongsTo('App\Models\Unit', 'unit_id');
    }
    public function generateRequisitionNumber(){
        $serial = $this->count_last_serial() + 1;
        $this->requisition_no = 'R-' . date('Y-m-') . str_pad($serial, 4, '0', STR_PAD_LEFT);
    }
    private function count_last_serial(){
        return Requisition::whereYear('created_at', date('Y'))
            ->whereMonth('created_at', date('m'))
            ->count();
    }
}
