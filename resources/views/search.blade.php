<?php
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
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
				<a href="#">Find your new friends</a>

				<span class="archive-link pull-right header-search-span">
            		<span class="header-search">
						<form method="post" action="{{route('search.submit')}} " id="myform">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" class="form-control input-sm" maxlength="64" name="content3" placeholder="Search" />
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






{{--<form method="post" action="{{route('search.submit')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input style="margin-left: 9em;" type="text" name="content3"/>
	<input type="submit" value="Search"/>
	
</form>--}}
	<br><br><br><br>


<div class="container">
	<div style="width: 110%; margin-left: -2.2em;" class="row">

		@if(!empty($users))
		@foreach($users as $u)


@php

	$path = $u->profile_pic;
    $file = basename($path);

@endphp


			<div class="col-md-4">
				<div class="well well-sm">
					<div class="media">
						<a class="thumbnail pull-left" href="#">
							<img style="width:80px; height: 80px;" class="media-object" src="..\resources\uploads\<?= $file ?>">
						</a>
						<div class="media-body">
							<h4 class="media-heading">{{$u->firstname}} {{ $u->lastname}}</h4>
							<p><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $u->username}}</p>
							<p><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ $u->email}}</p>
							<p><span class="label label-info">10 followings</span> <span class="label label-primary">89 followers</span>




							@if(in_array($u->id,$followers_ids))
								<button onclick="unfollow(this,{{$u->id}})" class="label label-primary"><span class="glyphicon glyphicon-ban-circle"></span> Unfollow</button></p>


							@else
								<button onclick="follow(this,{{$u->id}})" class="label label-primary"><span class="glyphicon glyphicon-send"></span> Follow</button></p>
							@endif




						</div>
					</div>
				</div>
			</div>



			@endforeach
		@endif



	</div>
</div>

<style>

	.media-left, .media>.pull-left {
		padding-right: 4px;!important;
	}

</style>

<script type="text/javascript">
function follow(el,user_id){

	var http = new XMLHttpRequest();
	
	var url = '{{route('user.follow')}}';
	
	var params = "_token={{csrf_token()}}&user_id="+user_id;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
		   
		    response = JSON.parse(http.responseText)
		    if(response.error != ""){
			    alert(response.error);
		    }else{
			   /* el.innerHTML = "Unfollow";*/
                el.innerHTML = '<span class="glyphicon glyphicon-ban-circle"></span> ' + ' Unfollow';
			    el.setAttribute("onclick","unfollow(this,"+user_id+")");
		    }
	    }
	}
	
	http.send(params);
}

function unfollow(el,user_id){
	var http = new XMLHttpRequest();
	
	var url = '{{route('user.unfollow')}}';
	
	var params = "_token={{csrf_token()}}&user_id="+user_id;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
		   
		    response = JSON.parse(http.responseText)
		    if(response.error != ""){
			    alert("Error with unfollowing user");
		    }else{
			  /*  el.innerHTML = "Follow";*/
                el.innerHTML = '<span class="glyphicon glyphicon-send"></span> ' + ' Follow';
			    el.setAttribute("onclick","follow(this,"+user_id+")");
		    }
	    }
	}
	
	http.send(params);
}
</script>
</body>

</html>
@endsection