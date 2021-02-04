<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Information</title>

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

<body>
	<?php
		if (isset($_GET['eventid']))
			$eventid = $_GET['eventid'];
		else
			$eventid = 0;
		
		include 'dbconnect.php';
		mysqli_select_db($conn,'utopia');

		$query = "SELECT eventid, eventname, eventdate, eventplace, eventfee FROM event1 WHERE eventid=$eventid";
		$result = mysqli_query($conn,$query) or die('SQL error');
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['eventid'])){
			$eventid = addslashes($_POST['eventid']);
			$eventname = addslashes($_POST['eventname']);
			$eventdate = addslashes($_POST['eventdate']);
			$eventplace = addslashes($_POST['eventplace']);
			$eventfee = addslashes($_POST['eventfee']);		
						
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "UPDATE event1 SET
				eventid = '$eventid', 
				eventname = '$eventname', 
				eventdate = '$eventdate',
				eventplace = '$eventplace',
				eventfee = '$eventfee'
				WHERE eventid = '$eventid'";
		
			$result = mysqli_query($conn,$query);
			if ($result){
				echo "<script type='text/javascript'>alert('Edit success')</script>"; 
			    echo '<script type="text/javascript">
					window.location = "event.php"</script>';
				}
			else
				echo "<script type='text/javascript'>alert('Edit failed')</script>";
		}
?>
	
  <br>
  
  <div>
	<form method="post" action="editevent.php">
		<h2>Updating Event Information.</h2><br>
		
		<input type="hidden" name="eventid" value="<?php echo $row['eventid']; ?>">
			
		<label for="eventname">Event Name</label>	
		<input type="text" name="eventname" value="<?php echo $row['eventname']; ?>">
		
		<label for="eventdate">Date</label>	
		<input type="date" name="eventdate" value="<?php echo $row['eventdate']; ?>">
		
		<label for="eventplace">Location</label>	
		<input type="text" name="eventplace" value="<?php echo $row['eventplace']; ?>">
		
		<label for="eventfee">Fee (RM)</label>	
		<input type="number" name="eventfee" value="<?php echo $row['eventfee']; ?>">
		
		<input type="submit" name="edit" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
		
    </form>
  </div>


</body>
</html>