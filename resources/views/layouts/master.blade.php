<!DOCTYPE html>
<html lang="en">
<head>
	<title>breddit: the backpage of the internet</title>
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="/snooboots-master/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/snooboots-master/dist/css/bootstrap-theme.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Master CSS -->
	<link rel="stylesheet" href="/css/master.css">
</head>
<body>
	<!-- Header -->
	<div id="header" role="banner">
		<div id="sr-header">

		</div>
		<div id="header-bottom-main">
			<h3>&nbsp;(b)reddit&nbsp;</h3>
		</div>
		<div id="header-bottom-right">
			<span class="user">
				@if (Auth::check())
				{{ Auth::user()->username }} (<strong>{{ Auth::user()->totalUserVotes() }}</strong>) | <strong><a href="#">preferences</a></strong> | <a href="{{ action('Auth\AuthController@getLogout') }}">logout</a>
				@else
				Want to join? <a href="{{ action('Auth\AuthController@getLogin') }}">Log In</a> or <a href="{{ action('Auth\AuthController@getRegister') }}">Sign Up</a> in seconds.
				@endif
			</span>
		</div>
	</div>
	<!-- end Header -->
	@if (session()->has('SUCCESS_MESSAGE'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ session('SUCCESS_MESSAGE') }}
	</div>
	@endif
	@if (session()->has('ERROR_MESSAGE'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ session('ERROR_MESSAGE') }}
	</div>
	@endif
	@yield('content')
	<!-- Latest compiled and minified JavaScript -->
	<script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	@yield('scripts')
</body>
</html>