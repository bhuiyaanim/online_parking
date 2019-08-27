<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
</head>
<body>
	<h1 align="center">Booking Details</h1>
	<div align="center">
		<a href="{{route('home.index')}}">Home</a> |
		<a href="{{route('booking.more')}}">Booking List</a> |
		<a href="/logout">Logout</a>	
	</div>
	
	<br>
	
	<table align="center">
		<tr>
			<td>Booking Id : </td>
			<td>{{$std['id']}}</td>
		</tr>
		<tr>
			<td>Name : </td>
			<td>{{$std['name']}}</td>
		</tr>
		<tr>
			<td>Email : </td>
			<td>{{$std['email']}}</td>
		</tr>
		<tr>
			<td>Contact No : </td>
			<td>{{$std['number']}}</td>
		</tr>
		<tr>
			<td>Park Space Name : </td>
			<td>{{$std['psname']}}</td>
		</tr>
		<tr>
			<td>Parking Location :</td>
			<td>{{$std['location']}}</td>
		</tr>
		<tr>
			<td>Date : </td>
			<td>{{$std['date']}}</td>
		</tr>
		<tr>
			<td>Time : </td>
			<td>{{$std['time']}}</td>
		</tr>
		<tr>
			<td>Duration : </td>
			<td>{{$std['duration']}}</td>
		</tr>
		<tr>
			<td>Vehicle Number : </td>
			<td>{{$std['vnumber']}}</td>
		</tr>
		<tr>
			<td>Vehicle Type : </td>
			<td>{{$std['type']}}</td>
		</tr>
		<tr>
			<td>Total Cost : </td>
			<td>{{$std['tc']}} taka</td>
		</tr>
	</table>
	
</body>
</html>