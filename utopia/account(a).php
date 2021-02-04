<?php
if (!isset($_SESSION['isLogged_in']))
{
$_SESSION['isLogged_in'] = FALSE;
$_SESSION['adminemail'] = '';
$adminemail = $_SESSION['adminemail'];
}
?>

<?php
	session_start();	
	
	if(isset($_SESSION['adminemail']))
	{
		include('dbconnect.php');
		mysqli_select_db($conn, 'utopia');
		$adminemail = $_SESSION['adminemail'];
		
		$query = "SELECT * FROM admin
						 WHERE adminemail = '$adminemail'";
						 
		$result = mysqli_query($conn, $query) or die('SQL error');
		$row = mysqli_fetch_array($result);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Utopia Book Club</title>

<style>
	body {
	  margin: 0;
	}
	
	h1.a {
		font-family: Arial;
		font-size: 28px;
	}

	ul {
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  width: 15%;
	  background-color: white;
	  position: fixed;
	  height: 100%;
	  
	}

	li a {
	  display: block;
	  color: #000;
	  padding: 18px 16px;
	  text-decoration: none;
	  font-size: 18px;
	  text-align: center;
	  font-family: Arial;
	  font-weight: bold;
	}

	li img {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}

	li a.active {
	  background-color: #b1bbda;
	  color: black;
	}

	li a:hover:not(.active) {
	  background-color: #555;
	  color: white;
	}

	#customers {
	  font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}

	#customers td, #customers th{
	  border: 1px solid #ddd;
	  padding: 25px;
	}

	#customers tr:hover {background-color: #eef0f7;}

	.button {
	  display: inline-block;
	  border-radius: 40px;
	  background-color: #b1bbda;
	  border: none;
	  color: black;
	  text-align: center;
	  font-size: 15px;
	  padding: 15px;
	  width: 200px;
	  transition: all 0.5s;
	  cursor: pointer;
	  margin-left: 15px;
	}

	.button span {
	  cursor: pointer;
	  display: inline-block;
	  position: relative;
	  transition: 0.5s;
	}

	.button span:after {
	  content: '\00bb';
	  position: absolute;
	  opacity: 0;
	  top: 0;
	  right: -20px;
	  transition: 0.5s;
	}

	.button:hover span {
	  padding-right: 25px;
	}

	.button:hover span:after {
	  opacity: 1;
	  right: 0;
	}
		
	a:link, a:visited {
		color: black;
		text-decoration: none;
	}
</style>
</head>
<body>


<br>

<ul>
  <li><img src="image/books2.gif" alt="Books" width="150" height="150"></li>
  <li><a href="home(a).php">Home</a></li>
  <li><a href="contact(a).php">Contact</a></li>
  <li><a href="event.php">Event</a></li>
  <li><a href="member.php">Member</a></li>
  <li><a class="active">Account</a></li>
  <li><a href="home.php">Logout</a></li>
</ul>

<div style="margin-left:18%;padding:1px 16px;height:400px;">
  <h1 class="a">Account Information.</h1>
    
  <div style="margin-top:45px">
	<form>
		<table id="customers">
	    <tr>
			<td><b>Name</b></td>
			<td>
			  <label>
				<?php echo $row['adminname'] ?></label></td>
		</tr>
		
		<tr>		
			<td><b>IC Number</b></td>
			<td>
			  <label><?php echo $row['adminic'] ?></label></td>
		</tr>
		
		<tr>
			<td><b>Contact Number</b></td>
			<td>
			  <label><?php echo $row['adminphone'] ?></label></td>
		</tr>
		
		<tr>
		  	<td><b>Email</b></td>
			<td>
			  <label><?php echo $row['adminemail'] ?></label></td>
		</tr>
		
		<tr>
		  	<td><b>Password</b></td>
			<td>
			  <label><?php echo $row['adminpassword'] ?></label></td>
		</tr>
		</table>
			
		<br><br>
		<p class="button" style="font-family: Arial;  float: right;">
			<a href="editadmin.php?adminid=<?php echo $row['adminid']; ?>" ><b>Update Account</b></a>			
		</p>
	
	</form>
  </div>
  
 </div>

</body>
</html>
