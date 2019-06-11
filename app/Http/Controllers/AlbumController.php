<?php

namespace App\Http\Controllers;
use App\User;
use App\Album;
use App\Playlist;
use App\Song;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use DB;

class AlbumController extends Controller
{
    public function showhub($userid)
    {
        $songs=DB::table('Songs')->where('isdeleted',0)->get();
        $data=[
            'songs' => $songs,
        ];

        return view('hub')->with($data);
        /*
        $table="<table class='table table-striped'>
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th colspan='2'>Action</th>
            </thead><tbody>";
        $n=1;
        foreach($songs as $song)
        {
            $table.="<tr>
                <td>$n</td>
                <td>$song->title</td>
                <td>$song->genre</td>
                <td><button class='btn btn-success playbtn' id='$albumid/$song->id'>Play</button></td>
                <td><button class='btn btn-primary playlistbtn' id='$song->id'>Add To Playlist</button></td>
            </tr>";
            $n++;
        }
        $table.="</tbody></table>";
        return($table);
        */
    }
    public function shownotifications(){
        return view('notifications');   
    }
    public function showplaylist()
    {
        $user=Auth::user();
        $playlist=DB::table('Playlists')->where('userid',$user->id)->get();
         $data=[
            'playlist' => $playlist,
        ];
        return view('playlist')->with($data);
    }
    public function addtoplaylist($songid)
    {
        $user=Auth::user();
        //$song=Song::where('id', '=', $songid)->firstOrFail();

        $song = DB::table('songs')->select('songs.id AS sid','albums.albumname AS albumname','songs.albumid AS albumid','songs.title as stitle','users.name as artist')->join('albums','albums.id', '=', 'songs.albumid')->join('users','users.id','=','songs.artistid')->where('songs.id',$songid)->first();

        //return(dd($song));

        $id=time();    
        $playlist = new Playlist();

        $playlist->id = $id; 
        $playlist->userid = $user->id;
        $playlist->songid = $song->sid;
        $playlist->albumid = $song->albumid;
        $playlist->songtitle = $song->stitle;
        $playlist->artist = $song->artist;
        $playlist->albumname = $song->albumname;
        $playlist->created_at = $id;
        $playlist->updated_at = $id;
        $playlist->save();
        return "Added to Playlist";
    }
    public function fetchsongs($albumid)
    {
        $songs=DB::table('Songs')->where('albumid',$albumid)->where('isdeleted',0)->get();
        $table="<table class='table table-striped'>
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Genre</th>
                <th colspan='2'>Action</th>
            </thead><tbody>";
        $n=1;
        foreach($songs as $song)
        {
            $table.="<tr>
                <td>$n</td>
                <td>$song->title</td>
                <td>$song->genre</td>
                <td><button class='btn btn-success playbtn' id='$albumid/$song->id'>Play</button></td>
                <td><button class='btn btn-primary playlistbtn' id='$song->id'>Add To Playlist</button></td>
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
