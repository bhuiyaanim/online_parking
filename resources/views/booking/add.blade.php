<!DOCTYPE html>
<html>
<head>
	<title>Request Booking</title>
</head>
<body>
	<h1 align="center">Request Booking</h1>
	<div align="center">
		<a href="{{route('home.index')}}">Home</a> |
		<a href="{{route('booking.more')}}">Booking List</a> |
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
			<td><input type="text" name="name" size="35" placeholder="Enter your name"></td>
		</tr>
		<tr>
			<td>Email Address</td>
		</tr>
		<tr>
			<td><input type="text" name="email" size="35" placeholder="Enter your email  ex:abc@xyz.com"></td>
		</tr>
		<tr>
			<td>Contact No.</td>
			
		</tr>
		<tr>
			<td><input type="text" name="number" size="35" placeholder="Enter your phone no. ex:01*********"></td>
		</tr>
		<tr>
			<td>Required Parking Name</td>
		</tr>
		<tr>
			<td><input type="text" name="psname" size="35" placeholder="Enter required area/location"></td>
		</tr>
		<tr>
			<td>Date</td>
		</tr>
		<tr>
			<td><input type="text" name="date" size="35" placeholder="Enter Date ex:day/month/year"></td>
		</tr>
		<tr>
			<td>Time</td>
		</tr>
		<tr>
			<td><input type="text" name="time" size="35" placeholder="Enter Time"></td>
		</tr>
		<tr>
			<td>Duration</td>
		</tr>
		<tr>
			<td><input type="text" name="duration" size="35" placeholder="Enter the duration of your booking"></td>
		</tr>
		<tr>
			<td>Vehicle Number</td>
		</tr>
		<tr>
			<td><input type="text" name="vnumber" size="35" placeholder="Enter vehicle no. ex:DHAKA-D-**-****"></td>
		</tr>
		<tr>
			<td>Vehicle Type</td>
		</tr>
		<tr>
			<td>
				<select name="type">
					<option value=""></option>
					<option value="motorcycle">Motorcycle</option>
					<option value="car">Car</option>
					<option value="truck">Truck</option>
					<option value="buse">Buse</option>
				</select>
			</td>
		</tr>

		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>

		
		<tr align="center">
			<td><input type="submit" name="save" value="Add" style="height:25px; width:110px"></td>
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