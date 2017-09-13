<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password','firstname','lastname','email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $table = "users2";
    
    
    public function posts(){
    	return $this->hasMany('App\Post');
    }
    
    public function albums(){
    	return $this->hasMany('App\Albums');
    }
    
    public function comments(){
    	return $this->hasMany('App\Comment');
    }
    
    public function getFollowersIds(){
    	$followers_ids = DB::table('users_friends')
    	->distinct('friend_id')
    	->where('user_id',$this->id)
    	->pluck('friend_id')->toArray();
    	return $followers_ids;
    }
    public function getFollowingsIds(){
        $followings_ids = DB::table('users_friends')
            ->distinct('friend_id')
            ->where('friend_id',$this->id)
            ->pluck('user_id')->toArray();
        return $followings_ids;
    }
    
    public static function getMatched($findme){
    	$users = User::where(function($query) use($findme){
    	
    		$query->where('firstname', 'like', '%'.$findme.'%')
    		->orWhere('lastname', 'like', '%'.$findme.'%')
    		->orWhere('username', 'like', '%'.$findme.'%');
    	})
    	->where(function ($query){
    		$query->where('id', '<>', Auth::user()->id);
    	})
    	->get();
    	return $users;
    }


    public function getFollowers(){
        $followers_ids = DB::table('users_friends')
            ->distinct('friend_id')
            ->where('user_id',$this->id)
            ->pluck('friend_id')->toArray();

        $users = DB::table('users2')
            ->whereIn('id', $followers_ids)
            ->get();

        return $users;
    }

    public function getFollowings(){
        $followings_ids = DB::table('users_friends')
            ->distinct('friend_id')
            ->where('friend_id',$this->id)
            ->pluck('user_id')->toArray();

        $users = DB::table('users2')
            ->whereIn('id', $followings_ids)
            ->get();
        return $users;
    }
}
