<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Album;
use DB;


class UsersprofileController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function editprofile()
    {
        return view('userprofile')->with('user',Auth::user());
    }
}
