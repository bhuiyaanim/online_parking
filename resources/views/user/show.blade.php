<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
</head>
<body>
	<div align="center">
		<h1 align="center">My Profile</h1>

		<a href="{{route('user.index')}}">Home</a> |
		<a href="{{route('userbooking.show')}}">My Booking List</a> |
		<a href="/logout">Logout</a>
	</div>
	<br>
	<table align="center">
		<tr>
			<td>Name : </td>
			<td>{{session('name')}}</td>
		</tr>
		<tr>
			<td>Email : </td>
			<td>{{session('email')}}</td>
		</tr>
		<tr>
			<td>Contact No : </td>
			<td>{{session('number')}}</td>
		</tr>
		<tr>
			<td>Password : </td>
			<td>{{session('password')}}</td>
		</tr>
		<tr>
			<td></td>
			<td ><input type="submit" name="submit" value="Edit"></td>
		</tr>
	</table>

	<a href="user.edit">
		<input type="button" value="Edit">
	</a>
	<input type="hidden" name="sid" value="{{session('password')}}">


</body>
</html>