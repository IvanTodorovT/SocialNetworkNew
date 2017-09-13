@extends('layouts.app2')



<head>

<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="..\resources\assets\css\edit_profile.css"/>
</head>
<body>




<nav class="navbar navbar-default" style="background-color: #C0C0C0; margin-right: 3em">
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
						<li><a href="upload2"><span class="fa fa-file-image-o" aria-hidden="true"></span> Change profile picture</a></li>
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


<div id='msg'></div>


<div id="fullscreen_bg" class="fullscreen_bg"/>
<form class="form-signin"  id="myForm" method='post' enctype="multipart/form-data">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">

						<div style="background-color: #C0C0C0; width: 25.6em; margin-left: -1.1em; margin-top:-1.1em;" class="panel-heading" ><h3 class="text-center">Reset Password</h3></div>
						<form class="form form-signup" role="form" >


							<div class="form-group">
								<div class="input-group">

									<img style="margin-left:6em;margin-top:1em;" id="blah" src="#" alt=""  />
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">

									<input style='display: inline-block;margin-left:6.3em;margin-top:1em;' id='file' type="file" name="file" onchange="readURL(this);"><br />
								</div>
							</div>

							<div class="form-group required-field-block">
								<div class="col-md-12 input-group">

								{{--	<br /><input style='display: inline-block;margin-left:12em;margin-top:1em;' type="submit">--}}
								</div>
							</div>

							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<a style="background-color: #C0C0C0" href="#" onclick="document.getElementById('myForm').submit()" class="btn btn-sm btn-default btn-block" role="button">Save</a>
						</form>
					</div>
				</div>
			</div>
		</div>


</body>



<script>



    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


$(function (){
	$("form").submit(function(e) {

	    var formData = new FormData($(this)[0]);

	    $.ajax({
	        url: window.location.pathname + "/upload",
	        type: 'POST',
	        data: formData,
	        async: true,
	        success: function (data) {
	            if (data){
					$("#msg").html("<h3>" + data + "</h3><hr>");
	            }
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });

	    e.preventDefault();
	});
});
</script>











<style>
	article, aside, figure, footer, header, hgroup,
	menu, nav, section { display: block; }
</style>




