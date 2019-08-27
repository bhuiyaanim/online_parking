<!DOCTYPE html>
<html>
<head>
	<title>Booking List</title>
</head>
<body>

	<h1 align="center">Booking List </h1>
	<a href="{{route('booking.index')}}">Home</a> |
	<a href="{{route('booking.bookingList')}}">Total Bookings</a> |
	<a href="{{route('booking.add')}}">Add Booking</a> |
	<a href="/logout">Logout</a>
	
	<br>
	<br>

	<table border="1" align="center">
		<tr align="center">
			<td>No</td>
			<td>Parking Space Name</td>
			<td>Location</td>
			<td>NAME</td>
			<td>Contact No</td>
			<td>Date</td>
			<td>Time</td>
			<td>Action</td>
		</tr>

		
		@foreach ($newlist as $n) 
			
			<tr>
				<td>{{$n['id']}}</td>
				<td>{{$n['psname']}}</td>
				<td>{{$n['location']}}</td>
				<td>{{$n['name']}}</td>
				<td>{{$n['number']}}</td>
				<td>{{$n['date']}}</td>
				<td>{{$n['time']}}</td>
				<td>
					<a href="{{route('booking.details', $n['id'])}}">Details</a> |
					<a href="{{route('booking.edit', $n['id'])}}">Edit</a> |
					<a href="{{route('booking.delete', $n['id'])}}">Delete</a>
				</td>
			</tr>

		@endforeach


	</table>
		

</body>
</html>