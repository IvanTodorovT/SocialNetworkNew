<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use Auth;
use Redirect;
use App\Post;
use App\Likes;
use App\Comments;


class PostController extends Controller
{
  
    

   
    public function __construct()
    {
    	//@TODO
//         $this->middleware('guest');
    }

    
     public function submit(Request $request)
    {
		
    	$post_text = $request->input('content');
    	$photo_input = $request->input('photo');
    	
    	$post = new Post();
    	$post->user_id = Auth::user()->id;
    	$post->text = $post_text;
    	$post->photo = $photo_input;
    	
    	$post->save();
    
    	
//     	DB::insert('insert into posts (user_id,text) values (?,?)', array(Auth::user()->id , $post_text));
    	
    	return Redirect::route('profile.show');
    }  
    
    public function show(Request $request,$post_id){
    	
    	$post = Post::find($post_id);
    	var_dump($post);
    }
    
    public function listAll(Request $request){
    
     	
    	$followers_ids = Auth::user()->getFollowersIds();
    	$posts = Post::with('author')
    	->whereIn('user_id',$followers_ids)
    	->orderBy('created_at','desc')
    	->get(); 
    	
    /* 	$followers_ids = Auth::user()->getFollowersIds();
    	$posts = DB::table('users2 as u')
    	->join('posts as p', 'u.id', '=', 'p.user_id')
    	->join('albums as a', 'a.user_id', '=', 'users.id')
    	->whereIn('user_id',$followers_ids)
    	->select('u.id AS uid','p.id AS pid','a.id as aid','u.firstname','u.lastname','u.created_at','p.text','p.photo','u.profile_pic')
    	->get(); */
    	
    	$idArray = $numbers = [];
    	foreach ($posts as $post) {
    		$idArray[] = $post->id;
    	}
    	
  		if ($idArray){
	    	$numbers = Likes::getNumbers('post_status', 'post_id', $idArray);
	    	$numbers['comments'] = Comments::getCommentsCount('post_comments', 'post_id', $idArray);
  		}
    	$data = array (
    		'posts' => $posts,
    		'numbers' => $numbers
    	 );
    				
    	return view('wall', $data);
    }
    
    public function listAll2($user_id){
    
    	$user = DB::table('users2')->where('id', '=', $user_id)->first();
        $followers_count = count(Auth::user()->getFollowers());
        $followings_count = count(Auth::user()->getFollowings());
    	$data = array (
    			'user' => $user,
                'followers_count' => $followers_count,
                'followings_count' => $followings_count
    	);

    
    	 
    	return view('profile_preview', $data);
    	 
    }
    
}
