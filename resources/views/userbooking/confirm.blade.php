<!DOCTYPE html>
<html>
<head>
	<title>Add Booking</title>
</head>
<body>
	<h1 align="center">Parking Booking</h1>

	<div align="center">
		<a href="{{route('user.index')}}">Home</a> |
		<a href="{{route('userbooking.show')}}">Booking List</a> |
		<a href="/logout">Logout</a>
	</div>
	<br>
<form method="post">
	@csrf	
	<table align="center">
		<tr>
			<td>Space ID : </td>
			<td>{{$spc['spaceId']}}</td>
		</tr>
		<tr>
			<td>Park Space Name : </td>
			<td>{{$spc['name']}}</td>
		</tr>
		<tr>
			<td>Parking Location :</td>
			<td>{{$spc['houseNo']}}, {{$spc['roadNo']}}, {{$spc['area']}}</td>
		</tr>
		<tr>
			<td>Date : </td>
			<td><input type="text" name="date" size="35" placeholder="Enter Date ex:day/month/year"></td>
		</tr>
		<tr>
			<td>Time : </td>
			<td><input type="text" name="time" size="35" placeholder="Enter Time"></td>
		</tr>
		<tr>
			<td>Duration : </td>
			<td><input type="text" name="duration" size="35" placeholder="Enter the duration of your booking"></td>
		</tr>
		<tr>
			<td>Vehicle Number : </td>
			<td><input type="text" name="vnumber" size="35" placeholder="Enter vehicle no. ex:DHAKA-D-**-****"></td>
		</tr>
		<tr>
			<td>Vehicle Type : </td>
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
		<tr>
			<td></td>
			<td ><input type="submit" name="submit" value="Submit" style="height:25px; width:110px"></td>
		</tr>
	</table>
</form>

	<div align="center">
			{{session('msg')}}
	</div>

	