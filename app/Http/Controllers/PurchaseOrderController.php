<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Project;
use App\Models\PurchaseOrder;
use App\Models\Requisition;
use App\Models\RequisitionCategory;
use App\Models\Unit;
use App\Models\Worker;
use Carbon\Carbon;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::latest()->get();
        $purchaseOrders = PurchaseOrder::latest()->get();
        return view('admin.purchase-order.index', compact('requisitions', 'purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $workers = Worker::latest()->get();
        $projects = Project::latest()->get();
        $requisitionCategories = RequisitionCategory::latest()->get();
        $countries = Country::latest()->get();
        $units = Unit::latest()->get();
        $requisition = Requisition::findOrFail($request->requisition_id);
//        $view = view('admin.purchase-order.create');
//        $view->with('requisition', $requisition);
//        return $view;
        return view('admin.purchase-order.create',
            compact('requisition', 'requisitionCategories', 'workers', 'projects', 'countries', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'requisition_type' => 'required',
            'manufacturer' => 'required',
            'country_id' => 'required',
            'project_id' => 'required',
            'worker_id' => 'required',
        ]);

        $purchaseOrder = new PurchaseOrder();
        $purchaseOrder->title = $request->title;
        $purchaseOrder->slug = Str::slug($request->title);
        $purchaseOrder->requisition_no = $request->requisition_no;
        $purchaseOrder->requisition_id = $request->requisition_id;
        $purchaseOrder->category_id = $request->category_id;
        $purchaseOrder->requisition_type = $request->requisition_type;
        $purchaseOrder->manufacturer = $request->manufacturer;
        $purchaseOrder->country_id = $request->country_id;
        $purchaseOrder->description = $request->description;
        $purchaseOrder->price = $request->price;
        $purchaseOrder->quantity = $request->quantity;
        $purchaseOrder->total_price = $request->total_price;
        $purchaseOrder->unit_id = $request->unit_id;
        $purchaseOrder->project_id = $request->project_id;
        $purchaseOrder->worker_id = $request->worker_id;
        $purchaseOrder->needed_date = Carbon::createFromFormat('d-m-Y', $request->needed_date);
        if (isset($request->approved_by)) {
            $purchaseOrder->approved_by = true;
        } else {
            $purchaseOrder->approved_by = false;
        }
        $purchaseOrder->generatePONumber();
        $purchaseOrder->save();
        return redirect()->route('purchase-order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        return view ('admin.purchase-order.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }

    public function invoice($id)
    {
        $order = PurchaseOrder::find($id);
       
        $data = ['order' => $order];

        $pdf = PDF::loadView('admin.purchase-order.invoice',
            $data,
            [],
            [
                'format' => 'A4-P',
                'orientation' => 'P',
            ]);
       
        return $pdf->download('invoice' . '.pdf');

    }

}
