<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail;
use App\User;

use App\Http\Controllers\Controller;

use App\Http\Requests;

class ResetPasswordController extends Controller
{
    public function index()
    {
      //  $this->sendEmailReminder();
        return view('auth.passwords.email');
    }



    public function sendEmailReminder()
    {

        $content = "Hi,welcome!";

        $data = [
            'content' => $content
        ];


        Mail::send( $data, ['title' => 'test', 'message' => 'ttetetetetest'], function ($message)
        {
           // $user = User::where('email', Input::get('email'))->first();
            $user = User::where('id', Auth::user()->id)->first();
            //dd($user);
            $name =  $user->firstname;
            $new_pass = $this->randomPassword();
            $user->password = $new_pass;
            $user->fill(array('password' =>bcrypt($new_pass)));
            $user->save();

            $message->from('social_network.support@abv.bg', 'PassReset');
            $message->to(Input::get('email'));
            $message ->setBody(" Hello $name!\n\n Your new password is '$new_pass'.\n It's a good idea to change it as soon as you log in! \n\n Kind Regards \n Social Network Team ");

        });
        return view('auth.passwords.test');
    }

    function randomPassword() {
        $alphabet = '1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

}
