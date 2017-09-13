
 <?php 
 
 $album_pic = $album->cover_photo;
 $output_prof = explode("\\",$album_pic)
 
 
 ?>
 
 
 
  

<!DOCTYPE html>
<html>






<head>
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
	<link rel="stylesheet" type="text/css" href="..\..\resources\assets\css\album_preview.css">

	<!-- Bootstrap core CSS -->
	<link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="album.css" rel="stylesheet">
</head>

<body>
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


<section class="jumbotron text-center">
	<div class="container">
		<h1 class="jumbotron-heading">{{$album->name}}</h1>
		<p class="lead text-muted">{{$album->description}}</p>
	<p>Created by: Ivan Todorov</p> <p>At: 2017-09-09 15:45:39</p>
	</div>
</section>





<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="../../../../assets/js/vendor/holder.min.js"></script>
<script>
    $(function () {
        Holder.addTheme("thumb", { background: "#55595c", foreground: "#eceeef", text: "Thumbnail" });
    });
</script>
<script src="../../../../dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>


<style>body {
		min-height: 75rem; /* Can be removed; just added for demo purposes */
	}

	.navbar {
		margin-bottom: 0;
	}

	.jumbotron {
		padding-top: 6rem;
		padding-bottom: 6rem;
		margin-bottom: 0;
		background-color: #fff;
	}

	.jumbotron p:last-child {
		margin-bottom: 0;
	}

	.jumbotron-heading {
		font-weight: 300;
	}

	.jumbotron .container {
		max-width: 40rem;
	}

	.album {
		min-height: 50rem; /* Can be removed; just added for demo purposes */
		padding-top: 3rem;
		padding-bottom: 3rem;
		background-color: #f7f7f7;
	}

	.card {
		float: left;
		width: 33.333%;
		padding: .75rem;
		margin-bottom: 2rem;
		border: 0;
	}

	.card > img {
		margin-bottom: .75rem;
	}

	.card-text {
		font-size: 85%;
	}

	footer {
		padding-top: 3rem;
		padding-bottom: 3rem;
	}

	footer p {
		margin-bottom: .25rem;
	}
</style>




 
<style>



hr.style17 {
    padding: 0;
  border: none; 
  border-top: medium double #8c8c8c; 
  color: black; 
  text-align: center; 
}
hr.style17:after {
 content: "�"; 
  display: inline-block; 
  position: relative; 
  top: -0.7em; 
  font-size: 1.5em; 
  padding: 0 0.25em; 
  background: #fff; 
}
</style>



<div class="album text-muted">
	<div class="container">

		<div class="row">

<?php 
/*   $postove =	DB::table('albums as a')
    ->join('posts as p', function($join)
   
    {
    	$join->on('a.id', '=', 'p.album_id');
    })
    ->select('a.id AS aid','p.id AS pid','p.text','p.photo')
    ->where('a.id', '=', 10)
    ->get();
     */



$postove = DB::select('SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.created_at,p.location,p.id as pid,p.photo,p.text,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a
	 on p.album_id= a.id where a.id= ? order by p.created_at desc ',array($album->id));
    
    
foreach ($postove as $post):
$post_photo = $post->photo;
$output_post = explode("\\",$post_photo);


$user_pic = $post->profile_pic;
$output_prof = explode("\\",$user_pic);


            $date = $post->created_at;

             $created_date = date("Y-m-d",strtotime($date));

?>





	<div class="card">
		<div style="margin-bottom: 1em;" class="hovereffect">
		<img style="height: 280px; width: 356px" src="..\..\resources\uploads\<?= $output_post[count($output_post) - 1] ?>" alt="no img">
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
		}</style>





    <?php endforeach;?>
</div>

</div>
</div>