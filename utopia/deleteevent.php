<?php
		// to retrieve data		
		if (isset($_GET['eventid'])) {
			$eventid = $_GET['eventid'];
			
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "DELETE FROM event1 WHERE eventid='$eventid'";
			$result = mysqli_query($conn,$query) or die('SQL ERROR');
			
			if ($result){
				echo "<script type='text/javascript'>alert('Delete Success')</script>";
				echo '<script type="text/javascript">
						   window.location = "event.php"
					  </script>';	}
			else
				echo "<script type='text/javascript'>alert('Delete Failed')</script>";
				
			
		}
		?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Event</title>
</head>
</html>