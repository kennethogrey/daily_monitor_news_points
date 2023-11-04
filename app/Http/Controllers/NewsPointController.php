<?php

namespace App\Http\Controllers;

use App\Models\NewsPoint;
use Illuminate\Http\Request;

class NewsPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news_point.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'latitude'=>'required|unique:news_points',
           'longitude'=>'required|unique:news_points',
           'address'=>'required|unique:news_points',
        ]);

        $news_point = new NewsPoint();
        $news_point->latitude = $request->latitude;
        $news_point->longitude = $request->longitude;
        $news_point->address = $request->address;

        if($news_point->save()){
            toastr()->success('News point added successfully');
            return redirect()->route('home');
        }else{
            toastr()->error('Oops! Something went wrong.');
            return redirect()->route('home');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(NewsPoint $newsPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news_point = NewsPoint::find($id);
        return view('news_point.edit', compact('news_point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news_point = NewsPoint::find($id);
        $news_point->latitude = $request->latitude;
        $news_point->longitude = $request->longitude;
        $news_point->address = $request->address;
        if($news_point->save()){
            toastr()->success('News Point updated Successfully.');
            return redirect()->route('home');
        }else{
            toastr()->error('Oops! Something went wrong.');
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $newsPoint = NewsPoint::find($id);
        if ($newsPoint->delete()){
            toastr()->success('News Point deleted successfully.');
            return redirect()->route('home');
        }else{
            toastr()->error('Oops! Something went wrong.');
            return redirect()->route('home');
        }
    }
}
