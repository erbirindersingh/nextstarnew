<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function index($user)
    {
    	$user=User::find($user);
    	$albums=DB::table('Albums')->where('artistid',$user->id)->get();

    	//dd($albums);
        $data=[
            'user'=> $user,
            'albums' => $albums,
        ];
    	return view('album')->with($data);
    }
}
