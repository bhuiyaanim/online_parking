<!DOCTYPE html>
<html>
<head>
	<title>Total Booking</title>
</head>
<body>

	<h1 align="center">Total Bookings</h1>
	<div align="center">
		<a href="{{route('booking.index')}}">Home</a> |
		<a href="{{route('booking.add')}}">Add Booking</a> |
		<a href="{{route('booking.more')}}">Booking List</a> |
		<a href="/logout">Logout</a>	
	</div>

	<br>

	<table border="1" align="center">
		<tr align="center">
			<td>No</td>
			<td>NAME</td>
			<td>Location</td>
			<td>Count</td>
			<td>Action</td>
		</tr>

		@php ($i = 1)
		@foreach ($bookinglist as $b) 
			
			<tr>
				<td>{{$i}}</td>
				<td style="display:none;">{{$b['id']}}</td>
				<td>{{$b['name']}}</td>
				<td>{{$b['location']}}</td>
				<td>{{$b['count']}}</td>
				<td>
					<a href="{{route('booking.total', $b['id'])}}">Details</a>
				</td>
			</tr>
			
		@php ($i++)
		@endforeach


	</table>
		

</body>
</html>