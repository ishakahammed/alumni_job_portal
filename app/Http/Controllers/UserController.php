<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}//func
    public function showPage(){
    	return view('Auth.passwords.password_change');
    }//func

    public function changePassword(Request $request){
    	
    	$user = User::findOrFail(auth()->id());


    	if(Hash::check($request->old_password, $user->password) == false){
    		 return Redirect()->back();
    	}

    	$this->validate($request, array( 
            'password' => "required|string|max:20|min:5",
            'password_confirmation'  => "required|string|max:20|min:5|same:password",
        ));

    	
		
    	//dd($password);

		User::where("id", '=',  auth()->id())
			 ->update(['password'=> Hash::make($request->password)]);

    	Session::flash('success', 'Successfully changed the password');

    	return redirect("/profiles/$user->id");
    }//func

}//class
