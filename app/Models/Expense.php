<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
