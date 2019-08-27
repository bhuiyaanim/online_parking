<!DOCTYPE html>
<html>
<head>
	<title>Total Booking</title>
</head>
<body>

	<h1 align="center">My Bookings</h1>
	
	<div align="center">
		<a href="{{route('user.index')}}">Home</a> |
		<a href="/search">Find Parking</a> |
		<a href="{{route('userbooking.index')}}">Add Booking</a> |
		<a href="/logout">Logout</a>
	</div>
	
	<br>
	<div align="center">
		<h3 align="center">Total Bookings : {{$count}}</h3>
	</div>

	<table border="1" align="center">
		<tr align="center">
			<td>No</td>
			<td>Date</td>
			<td>Time</td>
			<td>Parking Space Name</td>
			<td>Location</td>
			<td>Action</td>
		</tr>

		@php ($i = 1)
		@foreach ($list as $b)
		
			<tr>
				<td>{{$i}}</td>
				<td style="display:none;">{{$b['id']}}</td>
				<td>{{$b['date']}}</td>
				<td>{{$b['time']}}</td>
				<td>{{$b['psname']}}</td>
				<td>{{$b['location']}}</td>
				
				<td>
					<a href="{{route('userbooking.details', $b['id'])}}">Details</a>
					<a href="{{route('userbooking.edit', $b['id'])}}">Edit</a>
					<a href="{{route('userbooking.delete', $b['id'])}}">Delete</a>
				</td>
			</tr>

		@php ($i++)
		@endforeach


	</table>
		

</body>
</html>