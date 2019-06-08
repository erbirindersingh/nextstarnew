<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;
use DB;


class SongController extends Controller
{
    public function addsong($user,$albumid)
    {
    	$user=User::find($user);
    	$album=Album::find($albumid);
    	
    	//dd($albums);
        $data=[
            'user'=> $user,
            'album' => $album,
        ];
    	return view('song.add')->with($data);
    }
}
