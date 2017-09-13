@extends('layouts.app')
@section('content')


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



    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" ><h3 class="text-center">Reset Password</h3></div>
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <div class="panel-body" style="padding-left: 50px; padding-right: 50px;">
                  <form class="form-horizontal" role="form" method="GET" action="{{ route('change_pass33') }} ">

                        {{ csrf_field() }}

                    {{--   <input type="hidden" name="token" value="{{ $token }}">--}}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon "><i class="glyphicon glyphicon-envelope"></i></span>
                                    </span>
                                    <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled/>
                                </div>
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">




                          <div class="form-group">
                              <div class="input-group">
                                  <span class="input-group-addon"></span>
                                  </span>
                                  <input id="old_password" type="password" placeholder="Enter your current password here." class="form-control" name="old_password" required>

                                  @if ($errors->has('old_password'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                  @endif
                              </div>
                          </div>

                      </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">



                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input id="password" type="password" class="form-control" placeholder="Enter new password here." name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">



                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                    <input id="password-confirm" type="password" placeholder="Repeat new password here." class="form-control" name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button style="margin-left: -2em;!important;" type="submit" class="btn btn">
                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<link rel="stylesheet" type="text/css"
      href="\resources\assets\template-edit.css">
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
<link rel="stylesheet" type="text/css" href="..\resources\assets\css\edit_profile.css"/>
</head>
<body>







@endsection
