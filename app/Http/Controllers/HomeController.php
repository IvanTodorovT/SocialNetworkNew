<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Likes;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
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

        return view('profile',$data);

    }
}
