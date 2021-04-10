<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\Mobilization;
use App\Models\SiteClearance;
use App\Models\SiteEvaluation;
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
        return view('home', compact('siteEvaluations', 'mobilizations', 'siteClearances', 'documentations'));
    }
}
