<!DOCTYPE html>
<html>
<head>
	<title>Edit Parking Space</title>
</head>
<body>
	<h1 align="center">Edit PArking Space</h1>
	
	<div align="center">
		<a href="{{route('home.index')}}">Home</a> |
		<a href="{{route('parkingspace.spaceList')}}">Parking Space List</a> |
		<a href="/logout">Logout</a>	
	</div>
	
	<br>

<form method="post">
	@csrf	
	<table align="center">
		<tr>
			<td>ID : </td>
			<td>{{$std['spaceId']}}</td>
		</tr>
		<tr>
			<td>Name : </td>
			<td><input type="text" name="name" value="{{$std['name']}}" size="30"></td>
		</tr>
		<tr>
			<td>House No :</td>
			<td><input type="text" name="houseNo" value="{{$std['houseNo']}}" size="30"></td>
		</tr>
		<tr>
			<td>Road No :</td>
			<td><input type="text" name="roadNo" value="{{$std['roadNo']}}" size="30"></td>
		</tr>
		<tr>
			<td>Area :</td>
			<td><input type="text" name="area" value="{{$std['area']}}" size="30"></td>
		</tr>
		<tr>
			<td>Motorcycle :</td>
			<td><input type="text" name="motorcycle" value="{{$std['motorcycle']}}" size="30"></td>
		</tr>
		<tr>
			<td>Car :</td>
			<td><input type="text" name="car" value="{{$std['car']}}" size="30"></td>
		</tr>
		<tr>
			<td>Truck :</td>
			<td><input type="text" name="truck" value=" {{$std['truck']}}" size="30"></td>
		</tr>
		<tr>
			<td>Buse :</td>
			<td><input type="text" name="buse" value="{{$std['buse']}}" size="30"></td>
		</tr>
		<tr>
			<td>Charge/hr :</td>
			<td><input type="text" name="charge" value="{{$std['charge']}}" size="30"></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr align="center">
			<td> </td>
			<td><input type="submit" name="save" value="Update" style="height:25px; width:110px"></td>
		</tr>
	</table>
	
</form>


</body>
</html>