<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:55',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
            ]);
    }

   	public function edit(Request $request)
    {
        $this->validator($request->all())->validate();
        $request = $request->all();

        DB::table('users')->where('id', Auth::user()->id)
                    ->update(['username' => $request['username'] ,'firstname' => $request['firstname'] ,'lastname' => $request['lastname'] ,'birthdate' => $request['birthdate'] , 'email' => $request['email'], 'password' => bcrypt($request['password'])]);
        return redirect('/profile')->with('status', 'your profile has been successfully update.');
    }
}

