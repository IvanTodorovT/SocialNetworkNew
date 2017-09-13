<?php
use Illuminate\Http\Request;
use App\Post;
use App\User;
?>
@extends('layouts.app')
@section('content')


<body>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../../../favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">



<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="..\resources\assets\css\search.css">


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
				<li><a href="javascript:history.back(1);"><span class="fa fa-arrow-left" aria-hidden="true"></span> </a></li>
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
						<li><a href="upload2"><span class="fa fa-file-image-o" aria-hidden="true"></span> Change profile pictures</a></li>
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





<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="department-news-header">
				<a href="#">Search by #tag</a>

				<span class="archive-link pull-right header-search-span">
            		<span class="header-search">
						<form method="post" action="{{route('searchText.submit')}} " id="myform">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" class="form-control input-sm" maxlength="64" name="content4" placeholder="Search" />
							<a onclick="document.getElementById('myform').submit()" href="#link" role="button" class="btn-srch"><i class="fa fa-search"></i></a>
						</form>
                    </span>
            	</span>
			</h3>
		</div>
	</div>
</div>




<style>.home-news-header, .department-news-header, .sidebar-header {
		color: red !important;
		border-bottom: 2px solid #C0C0C0;
		padding-bottom: 10px;
	}

	.home-news-header > a, .department-news-header > a, .sidebar-header > a {
		color: #C0C0C0 !important;
	}

	.home-news-header span.archive-link a, .department-news-header span.archive-link a,
	.home-news-header span.archive-link span a, .department-news-header span.archive-link span a {
		color:#C0C0C0 !important;
	}

	.header-search-span {
		float: right;
		width: 250px;
		display: inline-block;
	}

	.header-search {
		width: 230px;
		position: relative;
		float: left;
	}

	.header-search input {
		position: absolute;
		width: 0px;
		float: Left;
		margin-left: 210px;
		-webkit-transition: all 0.7s ease-in-out;
		-moz-transition: all 0.7s ease-in-out;
		-o-transition: all 0.7s ease-in-out;
		transition: all 0.7s ease-in-out;
		border-radius:0;
		padding: 0 2px 0 2px;
		background: transparent;
		border: 0;
		box-shadow: none;
	}

	.header-search:hover input, .header-search input:focus {
		width: 200px;
		margin-left: 0px;
		color: #ffffff;
		font-weight: bold;
		background: #C0C0C0;
	}

	.header-search input::placeholder {
		color: #ffffff;
		font-weight: normal;
	}

	.btn-srch {
		position: absolute;
		right: 0;
		border: 0;
		background: transparent;
	}
</style>



<div class="album text-muted">
	<div class="container">

		<div class="row">


	<?php

	
	foreach ( $postove as $post ) :
	
	$comments = isset($numbers['comments'][$post->pid]) ? $numbers['comments'][$post->pid] : 0;
	$likes = isset($numbers['like'][$post->pid]) ? $numbers['like'][$post->pid] : 0;
	$dislikes = isset($numbers['dislike'][$post->pid]) ? $numbers['dislike'][$post->pid] : 0;
	$likeStatus = $dislikeStatus = '';
	if (isset($numbers['status'][$post->pid])){
		if ($numbers['status'][$post->pid] == 'like'){
			$likeStatus = 'inactive';
		} else if ($numbers['status'][$post->pid] == 'dislike') {
			$dislikeStatus = 'inactive';
		}
	}

	$post_photo = $post->photo;
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->profile_pic;
	$output_prof = explode("\\",$user_pic);

            $date = $post->created_at;

            $created_date = date("Y-m-d",strtotime($date));
	?>

<div class="card">
	<div style="margin-bottom: 1em;" class="hovereffect">
		<img style="height: 280px; width: 356px" src="..\resources\uploads\<?= $output_post[count($output_post) - 1] ?>" alt="no img">
	</div>
	<p class="card-text">{{$post->text}}</p>
	<p><i class="glyphicon glyphicon-user"></i> <a style="text-decoration: none;" href="{{ URL('profile_preview/'.$post->uid )}}"><?=  $post->firstname,' ', $post->lastname;?></a>&nbsp&nbsp <i  class="glyphicon glyphicon-time"></i> At: {{ $created_date }}  &nbsp <i  class="glyphicon glyphicon-map-marker"></i> {{ $post->location}}</p>
</div>


<style>.hovereffect {
		width:100%;
		height:100%;
		float:left;
		overflow:hidden;
		position:relative;
		text-align:center;
		cursor:default;
	}

	.hovereffect .overlay {
		width:100%;
		height:100%;
		position:absolute;
		overflow:hidden;
		top:0;
		left:0;
		opacity:0;
		background-color:rgba(0,0,0,0.5);
		-webkit-transition:all .4s ease-in-out;
		transition:all .4s ease-in-out
	}

	.hovereffect img {
		display:block;
		position:relative;
		-webkit-transition:all .4s linear;
		transition:all .4s linear;
	}

	.hovereffect h2 {
		text-transform:uppercase;
		color:#fff;
		text-align:center;
		position:relative;
		font-size:17px;
		background:rgba(0,0,0,0.6);
		-webkit-transform:translatey(-100px);
		-ms-transform:translatey(-100px);
		transform:translatey(-100px);
		-webkit-transition:all .2s ease-in-out;
		transition:all .2s ease-in-out;
		padding:10px;
	}

	.hovereffect a.info {
		text-decoration:none;
		display:inline-block;
		text-transform:uppercase;
		color:#fff;
		border:1px solid #fff;
		background-color:transparent;
		opacity:0;
		filter:alpha(opacity=0);
		-webkit-transition:all .2s ease-in-out;
		transition:all .2s ease-in-out;
		margin:50px 0 0;
		padding:7px 14px;
	}

	.hovereffect a.info:hover {
		box-shadow:0 0 5px #fff;
	}

	.hovereffect:hover img {
		-ms-transform:scale(1.2);
		-webkit-transform:scale(1.2);
		transform:scale(1.2);
	}

	.hovereffect:hover .overlay {
		opacity:1;
		filter:alpha(opacity=100);
	}

	.hovereffect:hover h2,.hovereffect:hover a.info {
		opacity:1;
		filter:alpha(opacity=100);
		-ms-transform:translatey(0);
		-webkit-transform:translatey(0);
		transform:translatey(0);
	}

	.hovereffect:hover a.info {
		-webkit-transition-delay:.2s;
		transition-delay:.2s;
	}
.card{
	float: left;
	width: 33.333%;
}

</style>





<?php endforeach;?>
</div>





</div>
</div>






</body>

</html>
@endsection