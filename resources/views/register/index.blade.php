<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
</head>
<body>
	<h1 align="center">Register page</h1>
	
	<form method="post">
		@csrf
		<table align="center">
			<tr>
				<td>Name</td>
			</tr>
			<tr>
				<td><input type="text" name="name" size="35" placeholder="Enter your name"></td>
			</tr>
			<tr>
				<td>Email</td>
			</tr>
			<tr>
				<td><input type="text" name="email" size="35" placeholder="Enter your email, ex:abc@gmail.com"></td>
			</tr>
			<tr>
				<td>Contact No.</td>
			</tr>
			<tr>
				<td><input type="text" name="number" size="35" placeholder="Enter your number, ex:01*********"></td>
			</tr>
			<tr>
				<td>Username</td>
			</tr>
			<tr>
				<td><input type="text" name="username" size="35" placeholder="Enter a username"></td>
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
				<td><input type="submit" name="submit" value="Register" style="height:25px; width:110px"></td>
			</tr>
			<tr></tr>
			<tr></tr>
			<tr align="center">
				<td>
					<a href="{{route('login.index')}}">Login</a>	
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