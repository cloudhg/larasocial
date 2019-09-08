<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User as UserEloquent;
use App\SocialUser as SocialUserEloquent;
use App;
use Auth;
use Config;
use Redirect;
use Socialite;

class SocialController extends Controller
{
    public function getSocialRedirect($provider){
	    $providerKey = Config::get('services.' . $provider);
	    if(empty($providerKey)){
	        return App::abort(404);
	    }
	    return Socialite::driver($provider)->redirect();
	}
	  //3rd party info judge
	public function getSocialCallback($provider, Request $request){
	    if($request->exists('error_code')){
            return Redirect::action('Auth\LoginController@showLoginForm')
                ->withErrors([
	                'msg' => $provider . 'Login fail, please try again'
                ]);
	    }

	    //catch info from 3rd party
	    $socialite_user = Socialite::with($provider)->user();
	
        //user already login can not/shall not enter this route
		$login_user = null;
	
	    //check the 3rd party user is already booked?
		$s_u = SocialUserEloquent::where('provider_user_id', $socialite_user->id)->where('provider', $provider)->first();
	    if(!empty($s_u)){
	        //If already booked by 3rd party's id: just login
	        $login_user = $s_u->user;
	    }else{ //3rd party's id is not booked in local site
	        //check 3rd party's email info
	        if (empty($socialite_user->email)) {
	            return Redirect::action('Auth\LoginController@showLoginForm')
	                ->withErrors([
	                    'msg' => 'Sorry, we could not reach email from your ' . $provider . 'account, please try other way, thanks!'
	                ]);
	        }//To make sure 3rd party has email info
	
	        //check 3rd party's email already booked in this site? [booked but not combined]
			$user = UserEloquent::where('email', $socialite_user->email)->first();
	        if(!empty($user)){//social id is not booked in local, but email is used in local
	            //email is used in local : login
				$login_user = $user;
	
	            //and to check the email is combined to 3rd party?
				$s_user = $login_user->socialUser;
				if (!empty($s_user)) {
	                //if 3rd party's id exist : error because 3rd party's id do not match local user id
	                return Redirect::action('Auth\LoginController@showLoginForm')
	                        ->withErrors([
	                            'msg' => 'this email is already used in local site! Please try other way.'
	                        ]);
				}else{
	                //Build 3rd party info in local and combined to local
	                $login_user->socialUser = SocialUserEloquent::create([
	                    'provider_user_id' => $socialite_user->id,
	                    'provider' => $provider,
	                    'user_id' => $login_user->id
	                ]);
				}
			}else{ //social id is not booked in local -> and email is not booked in local : register with 3rd party info			
				//Build user data in local
				$login_user = UserEloquent::create([
					'email' => $socialite_user->email,
					'password' => bcrypt(str_random(8)),
					'name' => $socialite_user->name,
				]);
	
	            //Build 3rd party info (in local)
				$login_user->socialUser = SocialUserEloquent::create([
				    'provider_user_id' => $socialite_user->id,
	                'provider' => $provider,
	                'user_id' => $login_user->id
				]);
			}
	    }
	           //login fail
	    if(!is_null($login_user)){
	        Auth::login($login_user);
            return Redirect::action('HomeController@index');
        }
        return App::abort(500);
    }
}
