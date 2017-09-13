<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Redirect;
use Laracasts\Flash\Flash;
use Validator;
class UploadProfileController extends Controller {
	
	public function uploadForm()
	{
		return view('uploadProfile');
	}
	
	public function uploadFiles()
	{
		$maxSize = 2097152; //2MB
		$user_id = \Auth::id();; // got t0 take this from the session or something when we have 100% working users
		if (!$user_id){
			return 'You have to be logged in to upload!';
		}
		if (empty($_FILES['file']['type'])){
			return 'Uploading an image is mendatory!';
		}
		if ($_FILES['file']['size'] > $maxSize){
			$inMB = $maxSize / 1048576;
			return "File can't be larger then $inMB MBs";
		}
		if (!preg_match('#^image/[A-z\-]{3,6}$#', $_FILES['file']['type'])){
			$this->deleteTmp();
			return 'You can upload only images';
		}
		$copy = file_get_contents($_FILES['file']['tmp_name']);
		$path = resource_path() . DIRECTORY_SEPARATOR . 'uploads';
		if (!@is_dir($path)){
			if (!@mkdir($path)){
				$this->deleteTmp();
				return 'Acces denied!';
			}
		}
		do {
			$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
			$fileName = uniqid(rand(), true) . '.' . $ext;
			$photo = $path . DIRECTORY_SEPARATOR . $fileName;
		} while(file_exists($photo));
		
		file_put_contents($photo, $copy);
		$this->deleteTmp();
		
// 		$album = empty($_POST['album']) ? NULL : $_POST['album'];
// 		if ($album) { 
// 			if (!$this->validateAlbumExistance ($album)) {
// 				return view('UploadForm', ['message'=>'Album does not exist']);
// 			}
// 		}  // decided to upload but without an album

	
		
		$id = @\DB::table('users2')->where('id', Auth::user()->id)->update([
				
				'profile_pic' => $photo,
				
		]);
		// two ways in laravel
// 		\DB::insert('INSERT INTO posts (user_id, text, photo, tag1, tag2, tag3) VALUES (?, ?, ?, ?, ?, ?)',
// 		[$user_id, $text, $photo, $tag1, $tag2, $tag3]);

		$album = empty($_POST['album']) ? NULL : $_POST['album'];
		if ($album) {
			$error = $this->addPostToAlbum($album, $id, $user_id);
			if ($error){
				return $error;
			}
		}
		
		return Redirect::route('profile.show');
	}
	
	private function deleteTmp()
	{
		unlink( $_FILES['file']['tmp_name'] );
	}
	
	private function validateAlbumExistance ($album)
	{
		
	}
	
	private function addPostToAlbum ($albumName, $postId, $userId)
	{
		$cols = ['name', 'user_id', 'created_at'];
		$array = @(array)\DB::table('albums')->select($cols)->where([
				['name', $albumName],
				['user_id', $userId],
				])->get()[0];
		
		if (empty($array)){
			$msg = 'Album does not exist. Try adding your image to an album from the options';
			return $msg;
		}
		$array['post_id'] = $postId;
		$cols[] = 'post_id';
		$qm = [];
		for ($i = 0; $i < count($array); $i++){
			$qm[] = '?';
		}
		$success = \DB::insert("INSERT INTO albums (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $qm) . ")",
		array_values($array));
		
		// Version where the id is copied as well, but it's primary key, so...
//  	$cols = ['id', 'name', 'user_id', 'created_at'];
// 		$array = @(array)\DB::table('albums')->select($cols)->where([
// 				['name', $albumName],
// 				['user_id', $userId],
// 				])->get()[0]; 
// 		if (empty($array)){
// 			$msg = 'Album does not exist. Your post was added to your profile without and album';
// 			return view('UploadForm', ['message'=>$msg]);
// 		}
// 		$array['post_id'] = $postId;
// 		$cols[] = 'post_id';
// 		$qm = [];
// 		for ($i = 0; $i < count($array); $i++){
// 			$qm[] = '?';
// 		}
// 		\DB::insert("INSERT INTO albums (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $qm) . ")",
// 		array_values($array));

		if (!$success){ return 'Adding to album failed. Try a different album.';}
	}

	public function changePassword(){

     /*   $user = User::where('email', Input::get('email'))->first();
        $new_pass = Input::get('password');
        $conf_new_pass = Input::get('password_confirmation');
*/


        return view('auth.passwords.reset');

    }



    protected $validationRules=[
        'title' => 'required|unique|max:255',
        'body' => 'required',
    ];

    public function changePassword3(){

        $pass = Auth::user()->password;
        $old_password2 = Input::get('old_password');

        $rules = array(
            'old_password'         => 'required',
            'password'         => 'required|confirmed',
            'password_confirmation' => 'required|same:password'
        );



if (password_verify($old_password2,$pass)) {
    $validator = Validator::make(Input::all(), $rules);


    // check if the validator failed -----------------------
    if ($validator->passes()) {

        $user = User::where('id', Auth::user()->id)->first();
        $user->password = bcrypt(Input::get('password'));
        $user->save();

        Session::flash('message', 'You change your password!');
        Session::flash('success-class', 'alert-success');
        return view('profile');


    } else {

        Session::flash('message', 'Passwords do not match!');
        Session::flash('alert-class', 'alert-danger');
        return view('auth.passwords.reset');
    }
}else{
    Session::flash('message', 'Wrong curent password!');
    Session::flash('alert-class', 'alert-danger');
    return view('auth.passwords.reset');
}





        //return view('auth.passwords.reset');

    }




public function getLocation()
{
    $latitude = 42.714312;
    $longitude = 23.3772034;

 //   $latitude = $_POST['latitude'];
  //  $longitude = $_POST['longitude'];

    $geolocation = $latitude.','.$longitude;
   // dd($geolocation);
    $request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false';
    $file_contents = file_get_contents($request);
    $json_decode = json_decode($file_contents);
    if(isset($json_decode->results[0])) {
        $response = array();
        foreach($json_decode->results[0]->address_components as $addressComponet) {
            if(in_array('political', $addressComponet->types)) {
                $response[] = $addressComponet->long_name;
            }
        }

        if(isset($response[0])){ $first  =  $response[0];  } else { $first  = 'null'; }
        if(isset($response[1])){ $second =  $response[1];  } else { $second = 'null'; }
        if(isset($response[2])){ $third  =  $response[2];  } else { $third  = 'null'; }
        if(isset($response[3])){ $fourth =  $response[3];  } else { $fourth = 'null'; }
        if(isset($response[4])){ $fifth  =  $response[4];  } else { $fifth  = 'null'; }

      /*  if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {
            echo "<br/>Address:: ".$first;
            echo "<br/>City:: ".$second;
            echo "<br/>State:: ".$fourth;
            echo "<br/>Country:: ".$fifth;
        }
        else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
            echo "<br/>Address:: ".$first;
            echo "<br/>City:: ".$second;
            echo "<br/>State:: ".$third;
            echo "<br/>Country:: ".$fourth;
        }
        else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
            echo "<br/>City:: ".$first;
            echo "<br/>State:: ".$second;
            echo "<br/>Country:: ".$third;
        }
        else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
            echo "<br/>State:: ".$first;
            echo "<br/>Country:: ".$second;
        }
        else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
            echo "<br/>Country:: ".$first;
        }*/
        if( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth != 'null' ) {

            echo "<br/>City:: ".$second;

            echo "<br/>Country:: ".$fifth;
        }
        else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth != 'null' && $fifth == 'null'  ) {
            $location = $second . ', ' . $fourth;
            echo $location;
           // $_POST['location'] = $location;

           return $location;
          //  echo "<br/>City:: ".$second;

           // echo "<br/>Country:: ".$fourth;
        }
        else if ( $first != 'null' && $second != 'null' && $third != 'null' && $fourth == 'null' && $fifth == 'null' ) {
            echo "<br/>City:: ".$first;
            echo "<br/>State:: ".$second;
            echo "<br/>Country:: ".$third;
        }
        else if ( $first != 'null' && $second != 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
            echo "<br/>State:: ".$first;
            echo "<br/>Country:: ".$second;
        }
        else if ( $first != 'null' && $second == 'null' && $third == 'null' && $fourth == 'null' && $fifth == 'null'  ) {
            echo "<br/>Country:: ".$first;
        }
}}


    public function changePassword2(){

    $user = User::where('email', Input::get('email'))->first();




        //$user = User::where('id', Auth::user()->id)->first();
        $new_pass = Input::get('password');

        $user->fill(array('password' =>bcrypt($new_pass)));
        $user->save();

      session()->flash('notif', 'Your password has been successfully changed!');

        return view('profile');
    }
}