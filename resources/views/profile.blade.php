<!DOCTYPE html>
<html>
<head>

@extends('layouts.app')
@section('content')


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="\resources\assets\template.css">
<link rel="stylesheet" type="text/css" href="..\resources\assets\css\profile.css">

</head>
<body>
<?php
$string = Auth::user()->profile_pic;

$string = empty(Auth::user()->profile_pic) ? '..\resources\uploads\default.jpg' : Auth::user()->profile_pic;
DB::table('users2')->where('id', '=', Auth::user()->id)
->update(
  array('profile_pic' => $string)
  );
		
$output = explode("\\",$string);
?>

<div>@if(session()->has('notif'))
<div class="row2">
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Notification </strong>{{session()->get('notif')}}
	</div>
</div>
@endif

</div>
{{--<div class="anchor">
<a href="wall" >Wall</a>
<a href="edit" style="margin-left:3em;">Edit</a>
<a href="searchText" style="margin-left:3em;">Search</a>
<a href="search" style="margin-left:3em;">FollowMe</a>
<a href="followers" style="margin-left:3em;">Followers</a>
</div>
<hr  height:2px/>--}}

<div style="margin-left: 3em;">
	@if(Session::has('message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
	@endif














		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					{{--<a class="navbar-brand" href="#">MY PAGE</a>--}}
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile</a></li>
						<li><a href="wall"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="searchText"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Search photo by tag</a></li>
								<li><a href="searchTag"><span class="fa fa-bars" aria-hidden="true"></span> Search photo by category</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="search"><span class="fa fa-users" aria-hidden="true"></span> Search users</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-edit" aria-hidden="true"></i> Edit<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="edit"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Edit profile details</a></li>
								<li><a href="upload2"><span class="fa fa-file-image-o" aria-hidden="true"></span>&nbsp&nbsp &nbsp Change profile picture</a></li>
								<li><a href="change_pass"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Change password</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-send" aria-hidden="true"></i> Follow Me<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="followers"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Followers</a></li>
								<li><a href="followings"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span> Followings</a></li>
							</ul>
						</li>
					</ul>


					<ul class="nav navbar-nav navbar-right">

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{  Auth::user()->firstname }} {{  Auth::user()->lastname }}<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
							</ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>









<div class="myclass">


				<div class="col-xs-12 col-sm-6 col-md-6" id="hui5">
					<div id="scroller-anchor"></div>
					<div class="well well-sm" id="hui2">
						<div class="row" id="hui4">
							<div class="col-sm-6 col-md-4" id="hui3">
								<img id="profi"  src="..\resources\uploads\<?= $output[count($output)-1]?>" alt="no pic" class="img-rounded" />
							</div>
							<div class="col-sm-6 col-md-8" id="hui">
								<h4>
									{{  Auth::user()->firstname }} {{  Auth::user()->lastname }}</h4>
								<small><i class="glyphicon glyphicon-map-marker">
									</i><cite title="Sofia, BG">Sofia, BG </cite></small>
								<p>
									<i class="glyphicon glyphicon-user"></i> {{  Auth::user()->username }}
									<br />
									<i class="glyphicon glyphicon-envelope"></i> {{  Auth::user()->email }}
									<br />
									<i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">www.jquery2dotnet.com</a>
									<br />
									<i class="glyphicon glyphicon-gift"></i>June 02, 1988</p>
								<!-- Split button -->
								<div class="btn-group">
									<button type="button" class="btn btn-btn">
										Social</button>
									<button type="button" class="btn btn-btn dropdown-toggle" data-toggle="dropdown">
										<span class="caret"></span><span class="sr-only">Social</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Twitter</a></li>
										<li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
										<li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
										<li class="divider"></li>
										<li><a href="#">Github</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

		</div>













    </div>












<div class="suggestions">




	<script src="https://use.fontawesome.com/1e803d693b.js"></script>

	<div class="container">
		<div class="row" id="hui6">
			<div id="scroller-anchor"></div>
			<div class="panel panel-default user_panel" id="panelcheto">
				<div class="panel-heading">
					<h3 class="panel-title">Supposed Friends</h3>
				</div>
				<div class="panel-body">
					<div class="table-container">
						<table class="table-users table" border="0">
							<tbody>
							<tr>
								<td width="10" align="center">
									<img style="width: 55px; height: 55px;" class="pull-left img-circle nav-user-photo" width="50" src="..\resources\uploads\<?= $output[count($output)-1]?>" />
								</td>
								<td>
									Ivan Todorov<br> <button onclick='alert("test")' class="icon-button"><span class="glyphicon glyphicon-send"></span></button>
								</td>

							</tr>
							<tr>
								<td width="10">
									<img style="width: 55px; height: 55px;" class="pull-left img-circle nav-user-photo" width="50" src="..\resources\uploads\<?= $output[count($output)-1]?>" />  
								</td>
								<td>
									Todor Georgiev<br> <button onclick='alert("test")' class="icon-button"><span class="glyphicon glyphicon-send"></span></button>
								</td>

							</tr>

							<tr>
								<td width="10">
									<img style="width: 55px; height: 55px;" class="pull-left img-circle nav-user-photo" width="50" src="..\resources\uploads\<?= $output[count($output)-1]?>" />  
								</td>
								<td>
									Vasil Stoqnov<br> <button onclick='alert("test")' class="icon-button"><span class="glyphicon glyphicon-send"></span></button>
								</td>

							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>




<script type="text/javascript">
    function moveScroller() {
        var $anchor = $("#scroller-anchor");
        var $scroller = $('#hui2');

        var move = function() {
            var st = $(window).scrollTop();
            var ot = $anchor.offset().top;
            if(st > ot) {
                $scroller.css({
                    position: "fixed",
                    top: "10px"
                });
            } else {
                $scroller.css({
                    position: "relative",
                    top: ""
                });
            }
        };
        $(window).scroll(move);
        move();
    }


    function moveScroller2() {
        var $anchor = $("#scroller-anchor");
        var $scroller = $('#hui6');

        var move = function() {
            var st = $(window).scrollTop();
            var ot = $anchor.offset().top;
            if(st > ot) {
                $scroller.css({
                    position: "fixed",
                    top: "10px"
                });
            } else {
                $scroller.css({
                    position: "relative",
                    top: ""
                });
            }
        };
        $(window).scroll(move);
        move();
    }
</script>


<script type="text/javascript">
    $(function() {
        moveScroller();
        moveScroller2();
    });
</script>






<div id="my_posts">

    <?php

    //$test = array(9,1);

    $followers_ids = Auth::user()->getFollowersIds();
    //$test = implode(',',$followers_ids);



    //$array=array_map('intval', explode(',', $followers_ids));
    $followers_ids = implode("','", $followers_ids);



    $postove = DB::select("SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.id as pid,p.photo,p.text,p.created_at,p.location,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a

	 on p.album_id= a.id WHERE p.user_id IN ('$followers_ids') order by p.created_at DESC ");


    //$followers_ids = array_values($followers_ids);


    foreach ( $postove as $post ) :


    $comments = isset($numbers['comments'][$post->pid]) ? $numbers['comments'][$post->pid] : 0;
    $likes = isset($numbers['like'][$post->pid]) ? $numbers['like'][$post->pid] : 0;
    $dislikes = isset($numbers['dislike'][$post->pid]) ? $numbers['dislike'][$post->pid] : 0;
    $likeStatus = $dislikeStatus = '';
    if (isset($numbers['status'][$post->pid])) {
        if ($numbers['status'][$post->pid] == 'like') {
            $likeStatus = 'inactive';
        } else if ($numbers['status'][$post->pid] == 'dislike') {
            $dislikeStatus = 'inactive';
        }
    }

    $post_photo = $post->photo;

    $output_post = explode("\\", $post_photo);


    $user_pic = $post->profile_pic;

    $output_prof = explode("\\", $user_pic)
    ?>


	<div class="post2" id=<?= $post->pid; ?> style="width: 70%;">

	<hr style='border: 1px solid black'/>

	<img style="width: 55px; height: 55px;" class="pull-left img-circle nav-user-photo"
		 src="..\resources\uploads\<?= $output_prof[count($output_prof) - 1]?>" alt="no pic"/>

	<a style=" float: left; margin-left:1em;" href="{{ URL('profile_preview/'.$post->uid )}}""><h2
			style="display: inline;"><?=  $post->firstname, ' ', $post->lastname;  ?>: </h2></a><br><br/><br><br/>




		<img style="width:150px; height:150px; padding-right: 0.8em; margin-top: -1em;" src="..\resources\uploads\<?= $output_post[count($output_post) - 1]?>" align="left">
		{{ $post->text}}




		<div id="bottom">
			<p><i class="glyphicon glyphicon-time"></i><b>At:</b> {{$post->created_at}}</p>
			<p style="display: inline;"><i class="fa fa-folder-o"></i><b>&nbsp&nbsp&nbsp  Album:</b> </p><a href="{{ URL('album_preview/'.$post->aid )}}""><?=  $post->name?></a>
			<p><i class="glyphicon glyphicon-map-marker"></i><b>{{$post->location}}</b></p>
		</div>
		<br>

			<div class="likeButtons">
				<span class="countComments">{{$comments}} </span>
				<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
				<span class="countDislikes">{{$dislikes}}</span>
				<i style="color: red;" class="fa fa-thumbs-down {{$dislikeStatus}}" aria-hidden="true"></i>
				<span class="countLikes">{{$likes}}</span>
				<i style="color: green;" class="fa fa-thumbs-up {{$likeStatus}}" aria-hidden="true"></i>
			</div>



</div>
<?php endforeach;?>






<div id='msg' style="margin-top:3em;"></div>

<section id='uploadForm'>
<p>Make post</p>
</section>

</body>
<div id="qsha">
<script type="text/javascript" src="js/addUploadForm.js"></script>
</div>
@endsection
