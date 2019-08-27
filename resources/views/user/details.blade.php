<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
</head>
<body>
	@csrf
	<div align="center">
		<h1 align="center">My Profile</h1>

		<a href="{{route('user.index')}}">Home</a> |
		<a href="{{route('userbooking.show')}}">My Booking List</a> |
		<a href="/logout">Logout</a>
	</div>
	<br>
	<table align="center">
		@foreach ($std as $b)
		<tr>
			<td style="display:none;">{{$b['id']}}</td>
		</tr>
		<tr>
			<td>Name : </td>
			<td>{{$b['name']}}</td>
		</tr>
		<tr>
			<td>Email : </td>
			<td>{{$b['email']}}</td>
		</tr>
		<tr>
			<td>Contact No : </td>
			<td>{{$b['number']}}</td>
		</tr>
		<tr>
			<td>Password : </td>
			<td>{{$b['password']}}</td>
		</tr>
		@endforeach
		<tr></tr>
		<tr></tr>
		<tr>
			<td></td>
			<td>
				<a href="{{route('user.edit', $b['id'])}}">
					<input type="button" value="Edit">
				</a>
			</td>
		</tr>
	</table>

</body>
</html>