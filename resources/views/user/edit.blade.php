<!DOCTYPE html>
<html>
<head>
	<title>Edit Booking</title>
</head>
<body>
	<h1 align="center">Edit Booking</h1>
	<div align="center">
		<a href="{{route('user.index')}}">Home</a> |
		<a href="{{route('userbooking.show')}}">Booking list</a> |
		<a href="/logout">Logout</a>
	</div>
	
	<br>
<form method="post">
	@csrf
	<table align="center">
		@foreach ($std as $b)
		<tr>
			<td style="display:none;"><input type="text" name="id" value="{{$b['id']}}"></td>
		</tr>
		<tr>
			<td>Name : </td>
		</tr>
		<tr>
			<td><input type="text" name="name" value="{{$b['name']}}" size="30"></td>
		</tr>
		<tr>
			<td>Email :</td>
		</tr>
		<tr>
			<td><input type="text" name="email" value="{{$b['email']}}" size="30"></td>
		</tr>
		<tr>
			<td>Contact No :</td>
		</tr>
		<tr>
			<td><input type="text" name="number" value="{{$b['number']}}" size="30"></td>
		</tr>
		<tr>
			<td>Username :  {{$b['username']}}</td>
			<td style="display:none;"><input type="text" name="id" value="{{$b['username']}}"></td>
		</tr>
		
		<tr>
			<td>Password :</td>
		</tr>
		<tr>
			<td><input type="text" name="password" value="{{$b['password']}}" size="30"></td>
		</tr>
		@endforeach
		<tr></tr>
		<tr></tr>
		<tr align="center">
			<td><input type="submit" name="save" value="save" style="height:30px; width:110px"></td>
		</tr>
	</table>
</form>

<div align="center">
	{{session('msg')}}
</div>

</body>
</html>