<!DOCTYPE html>
<html>
<head>
	<title>Create Parking Space</title>
</head>
<body>
	<h1 align="center">Add Parking Space</h1>
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
			<td>Name</td>
		</tr>
		<tr>
			<td><input type="text" name="name" size="35" placeholder="Enter name of the parking space"></td>
		</tr>
		
		<tr>
			<td>House No.</td>
		</tr>
		<tr>
			<td><input type="text" name="houseNo" size="35" placeholder="Enter house number"></td>
		</tr>
		<tr>
			<td>Road No.</td>
		</tr>
		<tr>
			<td><input type="text" name="roadNo" size="35" placeholder="Enter road number"></td>
		</tr>
		<tr>
			<td>Area</td>
		</tr>
		<tr>
			<td><input type="text" name="area" size="35" placeholder="Enter area"></td>
		</tr>
		
		<tr>
			<td>Motorcycle</td>
		</tr>
		<tr>
			<td><input type="text" name="motorcycle" size="35" placeholder="Enter capacity of motorcycle"></td>
		</tr>
		<tr>
			<td>Car</td>
		</tr>
		<tr>
			<td><input type="text" name="car" size="35" placeholder="Enter capacity of car"></td>
		</tr>
		<tr>
			<td>Truck</td>
		</tr>
		<tr>
			<td><input type="text" name="truck" size="35" placeholder="Enter capacity of truck"></td>
		</tr>
		<tr>
			<td>Buse</td>
		</tr>
		<tr>
			<td><input type="text" name="buse" size="35" placeholder="Enter capacity of buse"></td>
		</tr>
		
		<tr>
			<td>Charge/hr</td>
		</tr>
		<tr>
			<td><input type="text" name="charge" size="35" placeholder="Enter charge per hours"></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td align="center"><input type="submit" name="save" value="Add" style="height:25px; width:110px"></td>
		</tr>
	</table>
</form>

	<div align="center">
			{{session('msg')}}
	</div>

@foreach($errors->all() as $err)
	{{$err}} <br>
@endforeach




</body>
</html>