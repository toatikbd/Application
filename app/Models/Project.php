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
    public function architecturalDrawings()
    {
        return $this->hasMany(ArchitecturalDrawing::class);
    }
    public function  structuralDesigns()
    {
        return $this->hasMany(StructuralDesign::class);
    }
    public function interiorDetails()
    {
        return $this->hasMany(InteriorDetail::class);
    }
    public function documentations()
    {
        return $this->hasMany(Documentation::class);
    }
    public function contractors()
    {
        return $this->hasMany(Contractor::class);
    }
    public function requisitions()
    {
        return $this->hasMany(Requisition::class);
    }
    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }
}
