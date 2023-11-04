<?php

namespace App\Http\Controllers;

use App\Models\NewsPoint;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class ApplicationController extends Controller
{
    public function index(Request $request){
//      $userIp = $request->ip();
//      or
//      $userIp = $_SERVER['REMOTE_ADDR'];
//        $userIp = '102.134.149.174';
//
//        $location = Location::get($userIp);
//        return view('welcome', compact('location'));

        $news_points = NewsPoint::all();

        return view('welcome', compact('news_points'));
    }
}
