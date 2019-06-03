<?php

namespace App\Http\Controllers;
use App\Services\SocialFacebookAccountService;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        //return Socialite::driver('facebook')->redirect();
        return Socialite::driver('facebook')->stateless()->user();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
    	try {
	        $user = Socialite::driver('facebook')->user();
	    } catch (\Exception $e) {
	       echo $e->getMessage();
	    }
    }
}
