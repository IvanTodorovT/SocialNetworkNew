<?php
use App\Post;

?>
@extends('layouts.app')
 @section('content')


<div style="margin-left: 3em;">
	<a href="profile" style="margin-left: 35em;">Profile</a> <a
		href="/ittalents/Final/social_lara/Final3/public/"
		style="margin-left: 3em;">Welcome</a> 
		<a href="search" style="margin-left: 3em;">FollowMe</a>
		<a href="searchText" style="margin-left: 3em;">Search</a>

	
	<h1>Wall page<h1>
	
			</body>

	<?php


	
	foreach ( $posts as $post ) :
	

	$post_photo = $post->photo;
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->author->profile_pic;
	$output_prof = explode("\\",$user_pic)
	?>

<!-- 	I added an inline style here! Remove it if you write css -->
<!-- 	PS: You get Invalid tag location warning! -->
	<div class="post" id=<?= $post->id; ?> style="width: 60%;"> 	
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a href="{{ URL('profile_preview/'.$post->author->id )}}""><?=  $post->author->firstname,' ', $post->author->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
		<div class='likeButtons'></div>
		
	</div>
<?php endforeach;?>

</div>

@endsection
