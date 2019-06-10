<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Album;
use DB;

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
        return view('home')->with('user',Auth::user());
    }
	
	public function showall()
    {
    	$albums=DB::table('Albums')->where('isdeleted',0)->get();
    	$data=[
            'albums' => $albums,
        ];
    	return view('homeuser')->with($data);
    }
}
