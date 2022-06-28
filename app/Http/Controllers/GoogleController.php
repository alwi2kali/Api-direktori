<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function index(){
        
        return Socialite::driver('google')->redirect();
    }
    public function callback (){
        try {
            $user=Socialite::driver('google')->user();
            // dd($user);
            $finduser=user::where('email',$user->getemail())->first();
            // dd($finduser);
            if($finduser){

                \auth()->login($finduser, true);
                return redirect()->route('home');
                
                // Auth::login($finduser);
                // return redirect()->intended('home');
                // dd('a');
            }
            else{

                //  dd($user->bcrypt("fghjk"));
                $newUser=user::create([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'google_id'=>$user->id, 
                    'email_verified_at' => now(),           
                    'password' => encrypt('sdfghjk'),
                    
           
            
            

                ]);
                \auth()->login($finduser, true);
                return redirect()->route('home');
                // dd('a');
                // Auth::login($newUser);
                // return redirect()->route('home');$finduser
                
            }
        } catch (\Throwable $th) { 
            //throw $th;
        }
    }


// for facebook
    public function indexfb(){
      
        return Socialite::driver('facebook')->redirect();
        
        
    }
    public function callbackfb (){
        try {
            
         
            $fbuser = Socialite::driver('facebook')->stateless()->user();
            // dd($fbuser);
            $finduser=user::where('email',$fbuser->getemail())->first();
            // dd($finduser);
            if($finduser){
                // dd($user->name);
                \auth()->login($finduser, true);
                return redirect()->route('home');
                
                // Auth::login($finduser);
                // return redirect()->intended('home');
                // dd('a');
            }
            else{
                // dd($user->name);
                //  dd($user->bcrypt("fghjk"));
                $newUser=user::create([
                    'name'=>$fbuser->name,
                    'email'=>$fbuser->email,
                    'google_id'=>$fbuser->id,           
                    'password' => encrypt('sdfghjk'),
                ]);
                \auth()->login($finduser, true);
                return redirect()->route('home');
                // dd('a');
                // Auth::login($newUser);
                // return redirect()->route('home');$finduser
                
            }
        } catch (\Throwable $th) { 
            //throw $th;
        }
    }


    // for linkedin
    public function indexlinkedin(){
        
        return Socialite::driver('linkedin')->redirect();
    }
    public function callbacklinkedin (){
        try {

// dd('a');
            $userlink=Socialite::driver('linkedin')->stateless()->user();
            // dd($userlink);
            $finduser=user::where('email',$userlink->getemail())->first();
            // dd($finduser);
            if($finduser){

                \auth()->login($finduser, true);
                return redirect()->route('home');
                
                // Auth::login($finduser);
                // return redirect()->intended('home');
                // dd('a');
            }
            else{

                //  dd($user->bcrypt("fghjk"));
                $newUser=user::create([
                    'name'=>$userlink->name,
                    'email'=>$userlink->email,
                    'google_id'=>$userlink->id, 
                    'email_verified_at' => now(),           
                    'password' => encrypt('sdfghjk'),
                    
           
            
            

                ]);
                \auth()->login($finduser, true);
                return redirect()->route('home');
                // dd('a');
                // Auth::login($newUser);
                // return redirect()->route('home');$finduser
                
            }
        } catch (\Throwable $th) { 
            //throw $th;
        }
    }
}
