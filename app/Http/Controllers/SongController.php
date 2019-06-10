<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Album;
use App\Song;
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
    public function create(Request $request)
    {
        
        $this->validate($request,
            [
                'songfile' => 'required',
                'songtitle' => 'required',
                'songauthor' => 'required',
                'albumid' => 'required',
                'songgenre' => 'required',
            ]
        );
        
        //dd($request);

        $id=time();    
        $song = new Song();
        $song->id = $id;
        $song->title = $request->songtitle; 
        $song->artistid = $request->songauthor;
        $song->albumid = $request->albumid;
        $song->genre = $request->songgenre;
        $song->isdeleted = 0;
        $song->created_at = $id;
        $song->updated_at = $id;
        $song->save();

        

        $target_dir = "songs/".$request->albumid."/";
        $target_file = $target_dir.$id.".mp3";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["songfile"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check file size
        if ($_FILES["songfile"]["size"] > 25000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "mp3") {
            echo "Sorry, only MP3 files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }
            if (move_uploaded_file($_FILES["songfile"]["tmp_name"], $target_file)) {
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                //echo "Sorry, there was an error uploading your file.";
            }
        }
        //return view('album');
        //rename($request->upload_image1.".jpg","images/albums/$id.jpg");
        return redirect("/album/$request->songauthor");
    }
}
