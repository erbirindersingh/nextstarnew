<?php

namespace App\Http\Controllers;
use App\User;
use App\Album;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function fetchsongs($albumid)
    {
        $songs=DB::table('Songs')->where('albumid',$albumid)->where('isdeleted',0)->get();
        $table="<table class='table table-striped'>
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Action</th>
            </thead><tbody>";
        $n=1;
        foreach($songs as $song)
        {
            $table.="<tr>
                <td>$n</td>
                <td>$song->title</td>
                <td>$song->genre</td>
                <td><button class='btn btn-success playbtn' id='$albumid/$song->id'>Play</button></td>
            </tr>";
            $n++;
        }
        $table.="</tbody></table>";
        return($table);
    }
    public function index($user)
    {
    	$user=User::find($user);
    	$albums=DB::table('Albums')->where('artistid',$user->id)->where('isdeleted',0)->get();

    	//dd($albums);
        $data=[
            'user'=> $user,
            'albums' => $albums,
        ];
    	return view('album')->with($data);
    }
    public function showall()
    {
    	$albums=DB::table('Albums')->where('isdeleted',0)->get();
    	$data=[
            'albums' => $albums,
        ];
    	return view('directory')->with($data);
    }
    public function uploadcrop(){
        if(isset($_POST['image']))
        {
            $data = $_POST['image'];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $time=round(microtime(true) * 1000);
            $imageName = $time.'.jpg';
            file_put_contents($imageName, $data);
            return '<img src="'.$imageName.'" class="img-thumbnail" />~'.$time;
        }
    }

    public function create(Request $request)
    {
        /*
        $this->validate($request,
            [
                'albumname' => 'required',
                'albumauthor' => 'required',
                'upload_image1' => 'required'
            ]
        );
        */

        //dd($request);

        $id=time();    
        $album = new Album();
        $album->id = $id; 
        $album->albumname = $request->albumname;
        $album->artistid = $request->albumauthor;
        $album->isdeleted = 0;
        $album->created_at = $id;
        $album->updated_at = $id;
        $album->save();
        //return view('album');
        rename($request->upload_image1.".jpg","images/albums/$id.jpg");
        return redirect("/album/$request->albumauthor");
    }
}
