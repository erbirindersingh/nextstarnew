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

    public function create($request)
    {
        $this->validate($request,
            [
                'albumname' => 'required',
                'albumauthor' => 'required',
                'pprice' => 'required|numeric'
            ]
        );
        $product = new Product();
        $product->name = $request->pname;
        $product->description = $request->pdescription;
        $product->price = $request->pprice;
        $product->save();
    }
}
