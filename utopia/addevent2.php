<!DOCTYPE html>
<html>
<head>
	<title>Join Event</title>	
	
	<style>
	input[type=text], input[type=date], input[type=number]{
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	input[type=submit] , input[type=button]{
	  width: 100%;
	  background-color: #b1bbda;
	  color: black;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 40px;
	  cursor: pointer;
	  font-family: Arial;
	  font-weight: bold;
	  font-size: 14px;
	}

	input[type=submit]:hover, input[type=button]:hover {
	  background-color: #555;
	  color: white;
	}
	
	select {
		width: 100%;
		padding: 12px 20px;
		margin: 8px 0;
		display: inline-block;
		border: 1px solid #ccc;
		border-radius: 4px;
		box-sizing: border-box;
	}

	label {
		font-family: Arial;
		font-weight: bold;
		font-size: 15px;
	}

	h2 {
		font-family: Arial;
	}

	div {
	  border-radius: 5px;
	  background-color: #eef0f7;
	  padding: 20px;
	  width: 450px;
	  margin-left: 430px;
	}
	</style>
</head>
	
<?php   
		//TO ADD DATA
		if (isset($_POST['add'])) {
			$event2name = addslashes($_POST['event2name']);
			$event2date = addslashes($_POST['event2date']);
			$event2place = addslashes($_POST['event2place']);
			$event2fee = addslashes($_POST['event2fee']);
			
			
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "INSERT INTO event2 (event2name, event2date, event2place, event2fee) VALUES
				('$event2name', '$event2date', '$event2place', '$event2fee')";
			
			$result = mysqli_query($conn,$query);
			
			if ($result) {
				echo "<script type='text/javascript'>alert('Join success');</script>";
				echo '<script type="text/javascript">
						window.location = "eventmember.php"
			</script>';	}
			else
				echo "<script type='text/javascript'>alert('Join failed')</script>";
		}
?>
	
<body>
	
	<br>

	<div>
	<form method="post" action="addevent2.php">
		<h2>Join Event.</h2><br>
		
		<label>Event Name</label>
		<select name="event2name" id="event2name" required>
			<option>Books and Me</option>
			<option>Infinity Imaginations</option>
			<option>Faker or Not?</option>
		</select>
	
		<label>Date</label>
		<select name="event2date" id="event2date" required>
			<option>2020-11-12</option>
			<option>2020-07-15</option>
			<option>2020-12-31</option>
		</select>

		<label>Location</label>
		<select name="event2place" id="event2place" required>
			<option>Star Hall, Euphoria School</option>
			<option>Moon Hall, Euphoria School</option>
			<option>Field A, Euphoria School</option>
		</select>
		
		<label>Fee (RM)</label>
		<select name="event2fee" id="event2fee" required>
			<option>10</option>
			<option>25</option>
			<option>30</option>
		</select>
			
		<input type="submit" name="add" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
	</form>
	</div>
	
</body>
</html>