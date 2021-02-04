<!DOCTYPE html>
<html>
<head>
	<title>Utopia Book Club</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

a {
  text-decoration: none;
  color: black;
  font-weight: bold;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(odd){background-color: #eef0f7;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #b1bbda;
  color: black;
}

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
</style>
</head>
<body>

<br>

<ul>
  <li><img src="image/books2.gif" alt="Books" width="150" height="150"></li>
  <li><a href="home(m).php">Home</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a class="active">Event</a></li>
  <li><a href="account.php">Account</a></li>
  <li><a href="home.php">Logout</a></li>
</ul>

<div style="margin-left:18%;padding:1px 16px;height:400px;">
  <h1 class="a">Utopia Book Club's Event.</h1>
  
  <br>
  
  <table id="customers">
	<tr>
		<th>Event Name</th>
		<th>Date</th>
		<th>Location</th>
		<th>Fee (RM)</th>
	</tr>
	
		<?php
		include('dbconnect.php');
		mysqli_select_db($conn, 'utopia');
		
		if(!isset($_POST['submit'])){
			$sql = "SELECT * FROM event1";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>".$row['eventname']."</td>";
					echo "<td>".$row['eventdate']."</td>";
					echo "<td>".$row['eventplace']."</td>";
					echo "<td>".$row['eventfee']."</td>";
					echo "</tr>";
				}
			}
		}
	?>
	</table>

	<br><br>
	
	<button class="button" style="vertical-align:middle; float:right;">
	  <span>
		<a href="addevent2.php"><b>Join Event</b></a>
	  </span>
	</button>
	
	<br><br><br>
	
	<h1 class="a">Your Utopia Book Club's Event.</h1>
	
	<br>
	
	<table id="customers">
	<tr>
		<th>Event Name</th>
		<th>Date</th>
		<th>Location</th>
		<th>Fee (RM)</th>
		<th>Cancel</th>
	</tr>
	
	<?php
		include('dbconnect.php');
		mysqli_select_db($conn, 'utopia');
		
		if(!isset($_POST['submit'])){
			$sql = "SELECT * FROM event2";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>".$row['event2name']."</td>";
					echo "<td>".$row['event2date']."</td>";
					echo "<td>".$row['event2place']."</td>";
					echo "<td>".$row['event2fee']."</td>";
					
					echo '<td>
							<a href="deleteevent2.php?event2id='. $row['event2id'].' ">'."Cancel". "</a>
						  </td>";
					
					echo "</tr>";
				}
			}
		}
	?>
	
	</table>
 
</div>

</body>
</html>
