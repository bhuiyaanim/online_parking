<!DOCTYPE html>
<html>
<head>
	<title>PArking Space Details</title>
</head>
<body>
	<h1 align="center">Parking Space Details</h1>
	<div align="center">
		<a href="{{route('home.index')}}">Home</a> |
		<a href="{{route('parkingspace.spaceList')}}">Parking Space List</a> |
		<a href="/logout">Logout</a>	
	</div>
	
	<br>

	<table align="center">
		<tr>
			<td>Parking SpaceId : </td>
			<td>{{$std['spaceId']}}</td>
		</tr>
		<tr>
			<td>Name : </td>
			<td>{{$std['name']}}</td>
		</tr>
		<tr>
			<td>Location :</td>
			<td>{{$std['houseNo']}}, {{$std['roadNo']}}, {{$std['area']}}</td>
		</tr>
		<tr>
			<td>Capacity : </td>
			<td>{{$std['motorcycle']}}, {{$std['car']}}, {{$std['truck']}}, {{$std['buse']}} unit</td>
		</tr>
		<tr>
			<td>Charge/hr : </td>
			<td>{{$std['charge']}} taka</td>
		</tr>
	</table>
	
</body>
</html>