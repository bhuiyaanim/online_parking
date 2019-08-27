<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
</head>
<body>

	<h1 align="center">Home Page</h1>
	<br>
	<h2>Welcome {{session('name')}}</h2>
	
	@php ($i = session('username'))

	<a href="/search">Find Parking</a> |
	<a href="{{route('userbooking.show')}}">My Booking</a> |
	<a href="{{route('user.details', $i)}}">Profile</a> |
	<a href="/logout">Logout</a>
	
</body>
</html>