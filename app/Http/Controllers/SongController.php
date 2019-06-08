<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    //
	
	function listenAudio($fileName)
	{
		$file = Storage::disk('local')->get($fileName);
		return (new Response($file, 200))
				  ->header('Content-Type', 'audio/mpeg');
	}
}
