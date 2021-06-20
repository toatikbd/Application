<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function requisitions()
    {
        return $this->belongsTo(Requisition::class);
    }
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
    public function generatePONumber(){
//        $serial = $this->count_last_serial() + 1;
        $this->po_no = 'PO-' . str_pad(auth()->id(), 4, '0', STR_PAD_LEFT) . time();
    }
//    private function count_last_serial(){
//        return PurchaseOrder::whereYear('created_at', date('Y'))
//            ->whereMonth('created_at', date('m'))
//            ->count();
//    }
}
