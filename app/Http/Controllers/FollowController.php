<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Exception;

class FollowController extends Controller {

	public function follow(){
		
		$data = ['error'=>[]];
		$user_id = Input::get('user_id');
		try{
			DB::table('users_friends')->insert(
					array('user_id' => Auth::user()->id, 'friend_id' => $user_id)
					);
		}catch(Exception $e){
			$data['error'] = $e->getMessage();
		}
		return response()->json($data);
	}
	
public function unfollow(){
		$data = ['error'=>[]];
		
		
		$user_id = Input::get('user_id');
		try{
			DB::table('users_friends')->where('user_id', '=', Auth::user()->id)
			->where('friend_id' , $user_id)
					->delete();
			
		}catch(Exception $e){
			$data['error'] = "Error following user.";
		}
		return response()->json($data);
	}

	public function showFollowers(){
    $followers = Auth::user()->getFollowers();

        return view('followers')->with('followers', $followers);
    }

    public function showFollowings(){
        $followings = Auth::user()->getFollowings();

        return view('followings')->with('followings', $followings);
    }


    public function deleteFollowing(){
        $data = ['error'=>[]];


        $user_id = Input::get('user_id');
        try{
            DB::table('users_friends')->where('user_id', '=', $user_id)
                ->where('friend_id' ,  Auth::user()->id)
                ->delete();

        }catch(Exception $e){
            $data['error'] = "Error deleting user.";
        }
        return response()->json($data);
    }
}