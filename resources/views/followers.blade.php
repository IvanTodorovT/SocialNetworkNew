
@extends('layouts.app')

@section('content')


    <link rel="stylesheet" type="text/css"
          href="\resources\assets\template.css">

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
    <body>

    <div>@if(session()->has('notif'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification </strong>{{session()->get('notif')}}
                </div>
            </div>
        @endif

    </div>

    <div style="margin-left: 3em;">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        @php
            $count = count($followers);

        @endphp


            <h2><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Followers: <?= $count ?></h2>


            <div class="container">
                <div style="width: 110%; margin-left: -3.7em;" class="row">

                    @if(!empty($followers))
                        @foreach($followers as $u)


                            @php
                                $path = $u->profile_pic;
                                $file = basename($path);

    $followers_ids = Auth::user()->getFollowersIds();

                            @endphp

                            <style>

                                .media-left, .media>.pull-left {
                                    padding-right: 4px;!important;
                                }
                                .media-body{
                                    padding-left: 1em;
                                }

                            </style>

                            <div class="col-md-4">
                                <div class="well well-sm">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#">
                                            <img style="width:80px; height: 80px;" class="media-object" src="..\resources\uploads\<?= $file ?>">
                                        </a>
                                        <div style="max-width: -1em;" class="media-body">
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


    <hr style=" box-shadow: 0 0 10px 1px black;">
    <html>
    <body>

    <script>
        var x=document.getElementById("demo");
        function getLocation()
        {
            if (navigator.geolocation)
            {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
            else{x.innerHTML="Geolocation is not supported by this browser.";}
        }
        function showPosition(position)
        {
            x.innerHTML="Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
        }

        $url = 'path/to/phpFile.php';

        $.get($url, {name: get_name(), job: get_job()});

    </script>




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






































    <div class="container" style="margin-top:3em;margin-left:0em;margin-bottom:1em;">
        @if(!empty($followings))
            @foreach($followings as $u)
                <div style="padding-top:1em; width:12em;">





                    <h2 style="display: inline;margin-top:2em;" class="test">{{$u->firstname}} {{ $u->lastname}} &nbsp</h2>

                    @if(in_array($u->id,$followers_ids))
                        <button style="float:right" onclick="unfollow(this,{{$u->id}})">Unfollow</button>
                    @else
                        <button style="float:right" onclick="follow(this,{{$u->id}})">Follow</button>
                    @endif
                    <button style="float:right" onclick="deleteFollowing(this,{{$u->id}})">Del</button>
                </div>
                <hr>
            @endforeach
        @endif
    </div>
    </div>




    </body>
    <script type="text/javascript">




        function deleteFollowing(el,user_id){
            var http = new XMLHttpRequest();

            var url = '{{route('user.deleteFollowing')}}';

            var params = "_token={{csrf_token()}}&user_id="+user_id;
            http.open("POST", url, true);

            //Send the proper header information along with the request
            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            http.onreadystatechange = function() {//Call a function when the state changes.
                if(http.readyState == 4 && http.status == 200) {

                    response = JSON.parse(http.responseText)
                    if(response.error != ""){
                        alert("Error with deleting user");
                    }else{

                        document.getElementsByClassName("test").remove();
                        el.style.display = 'none';
                    }
                }
            }

            http.send(params);
        }

    </script>

@endsection

