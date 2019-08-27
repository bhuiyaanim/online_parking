<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br>
	<h1 align="center">Parking Solution</h1>

	<form method="post">
		@csrf
		<table align="center">
			<tr>
				<td>Username</td>
			</tr>
			<tr>
				<td><input type="text" name="uname" size="35" placeholder="Enter your username"></td>
			</tr>
			<tr>
				<td>Password</td>
			</tr>
			<tr>
				<td><input type="password" name="password" size="35" placeholder="Enter your password"></td>
			</tr>

			<tr></tr>
			<tr></tr>
			
			<tr align="center">
				<td ><input type="submit" name="submit" value="Login" style="height:25px; width:110px"></td>
			</tr>
			<tr align="center">
				<td>
					<a href="{{route('register.index')}}">Register now</a>	
				</td>
			</tr>
		</table>
	</form>

	<br>
	<div align="center">
		{{session('msg')}}
	</div>

@foreach($errors->all() as $err)
{{$err}} <br>
@endforeach

</body>
</html>