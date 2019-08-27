<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
</head>
<body>
	<h1 align="center">Booking Details</h1>

	<a href="{{route('booking.index')}}">Home</a> |
	<a href="{{route('booking.bookingList')}}">Back</a> |
	<a href="{{route('booking.more')}}">Booking List</a> |
	<a href="/logout">Logout</a>
	
	<table align="center">
		<tr>
			<td>Park Space Name : </td>
			<td>{{$std['name']}}</td>
		</tr>
		<tr>
			<td>Parking Location :</td>
			<td>{{$std['location']}}</td>
		</tr>
		<tr>
			<td>Booking Count :</td>
			<td>{{$std['count']}}</td>
		</tr>
		<tr>
			<td>Total Cost : </td>
			<td>{{$std['tc']}} taka</td>
		</tr>
	</table>
	
</body>
</html>