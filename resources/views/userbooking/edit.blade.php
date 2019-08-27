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
		<tr>
			<td>Booking ID : </td>
			<td>{{$std['id']}}</td>
		</tr>
		<tr>
			<td>Name : </td>
			<td>{{$std['name']}}</td>
		</tr>
		<tr>
			<td>Email :</td>
			<td>{{$std['email']}}</td>
		</tr>
		<tr>
			<td>Contact No :</td>
			<td>{{$std['number']}}</td>
		</tr>
		<tr>
			<td>Park Space Name :</td>
			<td><input type="text" name="psname" value="{{$std['psname']}}" size="30"></td>
		</tr>
		<tr>
			<td>Parking Location :</td>
			<td>{{$std['location']}}</td>
		</tr>
		<tr>
			<td>Date :</td>
			<td><input type="text" name="date" value="{{$std['date']}}" size="30"></td>
		</tr>
		<tr>
			<td>Time :</td>
			<td><input type="text" name="time" value="{{$std['time']}}" size="30"></td>
		</tr>
		<tr>
			<td>Duration :</td>
			<td><input type="text" name="duration" value="{{$std['duration']}}" size="30"></td>
		</tr>
		<tr>
			<td>Vehicle Number :</td>
			<td><input type="text" name="vnumber" value="{{$std['vnumber']}}" size="30"></td>
		</tr>
		<tr>
			<td>Vehicle Type :</td>
			<td>
				<select name="type">
					<option value="{{$std['type']}}">{{$std['type']}}</option>
					<option value="motorcycle">motorcycle</option>
					<option value="car">car</option>
					<option value="truck">truck</option>
					<option value="buse">buse</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Total Cost : </td>
			<td>{{$std['tc']}}</td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td></td>
			<td><input type="submit" name="save" value="save" style="height:30px; width:130px"></td>
		</tr>
	</table>
</form>

</body>
</html>