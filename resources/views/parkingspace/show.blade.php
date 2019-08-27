<!DOCTYPE html>
<html>
<head>
	<title>Student List</title>
</head>
<body>

	<h1 align="center">Parking Space List </h1>
	
	<div align="center">
		<a href="{{route('home.index')}}">Home</a> |
		<a href="{{route('parkingspace.add')}}">Add Parking Space</a> |
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
		@foreach ($stdlist as $s) 
			
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
					<a href="{{route('parkingspace.details', $s['spaceId'])}}">Details</a> |
					<a href="{{route('parkingspace.edit', $s['spaceId'])}}">Edit</a> |
					<a href="{{route('parkingspace.delete', $s['spaceId'])}}">Delete</a> 
				</td>
			</tr>
		@php ($i++)
		@endforeach


	</table>
		

</body>
</html>