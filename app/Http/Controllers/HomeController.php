<?php

namespace App\Http\Controllers;

use App\Models\ArchitecturalDrawing;
use App\Models\Documentation;
use App\Models\InteriorDetail;
use App\Models\MEP;
use App\Models\Mobilization;
use App\Models\Project;
use App\Models\SiteClearance;
use App\Models\SiteEvaluation;
use App\Models\StructuralDesign;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $siteEvaluations = SiteEvaluation::all()->count();
        $mobilizations = Mobilization::all()->count();
        $siteClearances = SiteClearance::all()->count();
        $documentations = Documentation::latest()->get();
        $architecturalDrawings = ArchitecturalDrawing::all()->count();
        $structuralDesigns = StructuralDesign::all()->count();
        $interiorDetails = InteriorDetail::all()->count();
        $mEPs = MEP::all()->count();
        $projects = Project::latest()->get();
        return view('home',
            compact(
                'siteEvaluations',
                'mobilizations',
                'siteClearances',
                'documentations',
                'architecturalDrawings',
                'structuralDesigns',
                'interiorDetails',
                'mEPs',
                'projects'
            )
        );
    }
}
