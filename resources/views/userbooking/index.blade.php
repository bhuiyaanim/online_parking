<!DOCTYPE html>
<html>
<head>
	<title>Parking Space List</title>
</head>
<body>

	<h1 align="center">Parking Space List </h1>
	
	<div align="center">
		<a href="{{route('user.index')}}">Home</a> |
		<a href="/search">Find Parking</a>|
		<a href="/logout">Logout</a>
	</div>
	
	<br>
	<div align="center">
		<h3 align="center">Total Parking Space : {{$count}}</h3>
	</div>

	<br>

	<table border="1" align="center">
		<tr align="center">
			<td>NO</td>
			<td>NAME</td>
			<td>Location</td>
			<td>Capacity</td>
			<td>Charge/hr</td>
			<td>Activity</td>
		</tr>

		@php ($i = 1)
		@foreach ($space as $s) 
			
			<tr>
				<td>{{$i}}</td>
				<td style="display:none;">{{$s['spaceId']}}</td>
				<td>{{$s['name']}}</td>
				<td>
					{{$s['houseNo']}}, {{$s['roadNo']}}, {{$s['area']}}
				</td>
				<td>
					{{$s['motorcycle']}}, {{$s['car']}}, {{$s['truck']}}, {{$s['buse']}}
				</td>
				<td>{{$s['charge']}}</td>
				<td>
					<a href="{{route('userbooking.confirm', $s['spaceId'])}}">Book Parking</a>
				</td>
			</tr>

		@php ($i++)
		@endforeach


	</table>
		

</body>
</html>