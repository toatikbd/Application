<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::latest()->get();
        return view('admin.worker.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.worker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'job_title' => 'required',
            'department' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,svg'
        ]);

//        $image = $request->file('image');
//        $slug = Str::slug($request->name);
//        if (isset($image)) {
//            // make uniq name for image
//            $currentDate = Carbon::now()->toDateString();
//            $imageName = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            // Check if worker Dir exists
//            if (!Storage::disk('public')->exists('worker')) {
//                Storage::disk('public')->makeDirectory('worker');
//            }
//            $workerImage = Image::make($image)->stream();
//            Storage::disk('public')->put('worker/' . $imageName, $workerImage);
//
//        } else {
//            $imageName = 'default.png';
//        }


        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $worker = new Worker();
        $worker->name = $request->name;
        $worker->slug = Str::slug($request-> name);
        $worker->job_title = $request->job_title;
        $worker->department = $request->department;
        $worker->image = $imageName;
        $worker->save();
        return redirect()->route('worker.index')
            ->with('success', 'Supervisor Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('admin.worker.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Worker $worker)
    {
        $this->validate($request, [
            'name' => 'required',
            'job_title' => 'required',
            'department' => 'required'
        ]);

        $image = $request->file('image');
        if($image){
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $worker->image = $imageName;
        }

        $worker->name = $request->name;
        $worker->slug = Str::slug($request-> name);
        $worker->job_title = $request->job_title;
        $worker->department = $request->department;
        $worker->save();
        return redirect()->route('worker.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->back();
    }
}