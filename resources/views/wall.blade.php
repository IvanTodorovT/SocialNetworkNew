<?php
use App\Post;
use App\Http\Controllers\FollowController;

?>
@extends('layouts.app')
@section('content')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">






		<nav class="navbar navbar-default">
			<div  class="container-fluid">
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
				<div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="javascript:history.back(1);"><span class="fa fa-arrow-left" aria-hidden="true"></span></a></li>
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




	<div style="margin-left: 4em;">

		<h2 style="color: #7c795d; font-family: 'Trocchi', serif; font-size: 35px; font-weight: normal; line-height: 48px; margin: 0;">See all news from your friends:</h2><br>
	</div>
				</body>

                <?php

                //$test = array(9,1);

                $followers_ids = Auth::user()->getFollowersIds();
                //$test = implode(',',$followers_ids);



                //$array=array_map('intval', explode(',', $followers_ids));
                $followers_ids = implode("','",$followers_ids);



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
                $profile_pic = str_replace('\\', '/', $user_pic);
                /*../../resources/uploads/2637259b506e6244e60.28240152.jpg*/
              //  $test = '../../' . $output_prof[7] . '/' . $output_prof[8] . '/' . $output_prof[9];
                ?>









				<div class="container">
					<div class="row">
						<div class="row">
							<div class="col-xs-12 col-sm-3 col-md-3">

								<a href="#">
									<img src="..\resources\uploads\<?= $output_post[count($output_post) - 1] ?>" class="img-responsive img-box img-thumbnail">
								</a>

							</div>
							<div class="col-xs-12 col-sm-9 col-md-9">
								<div class="list-group">
									<div class="list-group-item">
										<div class="row-picture">
											<a href="#" title="sintret">
												<img class="circle img-thumbnail img-box" src="..\resources\uploads\<?= $output_prof[count($output_prof) - 1]?>" alt="sintret">
											</a>
										</div>
										<div class="row-content">
											<div class="list-group-item-heading">
												<a href="#" title="sintret">
													<small><?=  $post->firstname, ' ', $post->lastname;  ?>:</small>
												</a>
											</div>
											<small>

												<span  class="explore"><i class="fa fa-folder-o"></i> Album: <a href="{{ URL('album_preview/'.$post->aid )}}"><?=  $post->name?></a></span>&nbsp&nbsp

												<i  class="glyphicon glyphicon-time"></i> At: {{$post->created_at}} &nbsp

												<i  class="glyphicon glyphicon-map-marker"></i> {{$post->location}} &nbsp
											</small>
										</div>
									</div>
								</div>

								<p style="font-size: 1.6em">{{ $post->text}}</p><br><br>


								<div class="post" style="position: relative;" id=<?= $post->pid; ?>;>
									<div style="" class="likeButtons">
										<span style="" class="countComments">{{$comments}} </span>
										<i style="color: orange; " class="fa fa-comment" aria-hidden="true"></i>
										<span  class="countDislikes">{{$dislikes}}</span>
										<i style="color: red;" class="fa fa-thumbs-down {{$dislikeStatus}}" aria-hidden="true"></i>
										<span class="countLikes">{{$likes}}</span>
										<i style="color: green;" class="fa fa-thumbs-up {{$likeStatus}}" aria-hidden="true"></i>
									</div>
								</div>
							</div>

						</div>
						<hr>

					</div>
				</div>

	</div>
    <?php endforeach;?>

	</div>






		</div>
	</div>


	<style>.list-group {border-radius: 0;}
		.list-group .list-group-item {background-color: transparent;overflow: hidden;border: 0;border-radius: 0;padding: 0 16px;}
		.list-group .list-group-item .row-picture,
		.list-group .list-group-item .row-action-primary {float: left;display: inline-block;padding-right: 16px;padding-top: 8px;}
		.list-group .list-group-item .row-picture img,
		.list-group .list-group-item .row-action-primary img,
		.list-group .list-group-item .row-picture i,
		.list-group .list-group-item .row-action-primary i,
		.list-group .list-group-item .row-picture label,
		.list-group .list-group-item .row-action-primary label {display: block;width: 56px;height: 56px;}
		.list-group .list-group-item .row-picture img,
		.list-group .list-group-item .row-action-primary img {background: rgba(0, 0, 0, 0.1);padding: 1px;}
		.list-group .list-group-item .row-picture img.circle,
		.list-group .list-group-item .row-action-primary img.circle {border-radius: 100%;}
		.list-group .list-group-item .row-picture i,
		.list-group .list-group-item .row-action-primary i {background: rgba(0, 0, 0, 0.25);border-radius: 100%;text-align: center;line-height: 56px;font-size: 20px;color: white;}
		.list-group .list-group-item .row-picture label,
		.list-group .list-group-item .row-action-primary label {margin-left: 7px;margin-right: -7px;margin-top: 5px;margin-bottom: -5px;}
		.list-group .list-group-item .row-content {display: inline-block;width: calc(100% - 92px);min-height: 66px;}
		.list-group .list-group-item .row-content .action-secondary {position: absolute;right: 16px;top: 16px;}
		.list-group .list-group-item .row-content .action-secondary i {font-size: 20px;color: rgba(0, 0, 0, 0.25);cursor: pointer;}
		.list-group .list-group-item .row-content .action-secondary ~ * {max-width: calc(100% - 30px);}
		.list-group .list-group-item .row-content .least-content {position: absolute;right: 16px;top: 0px;color: rgba(0, 0, 0, 0.54);font-size: 14px;}
		.list-group .list-group-item .list-group-item-heading {color: rgba(0, 0, 0, 0.77);font-size: 20px;line-height: 29px;}
		.list-group .list-group-separator {clear: both;overflow: hidden;margin-top: 10px;margin-bottom: 10px;}
		.list-group .list-group-separator:before {content: "";width: calc(100% - 90px);border-bottom: 1px solid rgba(0, 0, 0, 0.1);float: right;}

		.bg-profile{background-color: #3498DB !important;height: 150px;z-index: 1;}
		.bg-bottom{height: 100px;margin-left: 30px;}
		.img-profile{display: inline-block !important;background-color: #fff;border-radius: 6px;margin-top: -50%;padding: 1px;vertical-align: bottom;border: 2px solid #fff;-moz-box-sizing: border-box;box-sizing: border-box;color: #fff;z-index: 2;}
		.row-float{margin-top: -40px;}
		.explore a {color: green; font-size: 13px;font-weight: 600}
		.twitter a {color:#4099FF}
		.img-box{box-shadow: 0 3px 6px rgba(0,0,0,.16),0 3px 6px rgba(0,0,0,.23);border-radius: 2px;border: 0;}

.navbar{
	margin-left: 3em;
	margin-top:2em;
	background-color: #C0C0C0;
}






		@import url('https://fonts.googleapis.com/css?family=Lato:300,400');

		html, body {
			font-family: 'Lato', serif;
		}

		.navbar-default {
			font-size: 1.15em;
			font-weight: 400;
			background-color:  #C0C0C0;
			padding: 10px;
			border: 0px;
			border-radius: 0px;
		}

		.navbar-default .navbar-nav>li>a {
			color: white;
		}

		.navbar-default .navbar-nav>li>a:hover {
			color: #cbf0ff;
		}

		.navbar-default .navbar-brand {
			color: #002433;
		}

		.navbar-default .navbar-brand:hover {
			color: #ffffff;
			text-shadow: 1px -1px 8px #b3e9ff;
		}

		.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
			background-color: #004059;
			color: white;
		}

		.navbar-default .navbar-toggle {
			border: none;
		}

		.navbar-default .navbar-collapse, .navbar-default .navbar-form {
			border: none;
		}

		.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
			background-color: #002433;
		}

		.navbar-default .navbar-toggle .icon-bar {
			background-color: #ffffff;
		}

		.dropdown-menu {
			background-color: #004059;
			color: white;
			border: 0px;
			border-radius: 2px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.dropdown-menu>li>a {
			background-color: #004059;
			color: white;
		}

		.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus {
			background-color: #004059;
			color:white;
		}

		.dropdown-menu .divider {
			height: 1px;
			margin: 9px 0;
			overflow: hidden;
			background-color: #003246;
		}

		.navbar-default .navbar-nav .open .dropdown-menu>li>a {
			color: #ffffff;
		}

		@media (max-width: 767px) {
			.dropdown-menu>li>a {
				background-color: #006b96;
				color: #ffffff;
			}
			.dropdown-menu>li>a:hover {
				color: #ffffff;
			}

			.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus, .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover {
				color: #ffffff;
				background-color: transparent;
			}

			.dropdown-menu .divider {
				height: 1px;
				margin: 9px 0;
				overflow: hidden;
				background-color: #005577;
			}
		} /* END Media Query */

.post ,.likeButtons{
	height: 2.2em;
	margin-top: 1em;
}
	</style>


@endsection
