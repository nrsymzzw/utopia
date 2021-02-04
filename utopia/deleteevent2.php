<?php
		// to retrieve data		
		if (isset($_GET['event2id'])) {
			$event2id = $_GET['event2id'];
			
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "DELETE FROM event2 WHERE event2id='$event2id'";
			$result = mysqli_query($conn,$query) or die('SQL ERROR');
			
			if ($result){
				echo "<script type='text/javascript'>alert('Delete Success')</script>";
				echo '<script type="text/javascript">
						   window.location = "eventmember.php"
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