<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>	
	
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
			$eventname = addslashes($_POST['eventname']);
			$eventdate = addslashes($_POST['eventdate']);
			$eventplace = addslashes($_POST['eventplace']);
			$eventfee = addslashes($_POST['eventfee']);
			
			
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "INSERT INTO event1 (eventname, eventdate, eventplace, eventfee) VALUES
				('$eventname', '$eventdate', '$eventplace', '$eventfee')";
			
			$result = mysqli_query($conn,$query);
			
			if ($result) {
				echo "<script type='text/javascript'>alert('Add sucess');</script>";
				echo '<script type="text/javascript">
						window.location = "event.php"
			</script>';	}
			else
				echo "<script type='text/javascript'>alert('Add failed')</script>";
		}
?>
	
<body>
	
	<br>

	<div>
	<form method="post" action="addevent.php">
		<h2>Add Event.</h2><br>
		
		<label>Event Name</label>
		<input type="text" name="eventname" required>
	
		<label>Date</label>
		<input type="date" name="eventdate" required>

		<label>Location</label>
		<input type="text" name="eventplace" required>
		
		<label>Fee (RM)</label>
		<input type="number" name="eventfee" required>
			
		<input type="submit" name="add" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
	</form>
	</div>
	
</body>
</html>