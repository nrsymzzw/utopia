<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Information</title>

<style>
input[type=text] {
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
		if (isset($_GET['adminid']))
			$adminid = $_GET['adminid'];
		else
			$adminid = 0;
		
		include 'dbconnect.php';
		mysqli_select_db($conn,'utopia');

		$query = "SELECT * FROM admin WHERE adminid=$adminid";
		$result = mysqli_query($conn,$query) or die('SQL error');
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['adminid'])){
			$adminid = addslashes($_POST['adminid']);
			$adminname = addslashes($_POST['adminname']);
			$adminic = addslashes($_POST['adminic']);
			$adminphone = addslashes($_POST['adminphone']);
			$adminemail = addslashes($_POST['adminemail']);
			$adminpassword = addslashes($_POST['adminpassword']);		
						
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "UPDATE admin SET
				adminid = '$adminid', 
				adminname = '$adminname', 
				adminic = '$adminic',
				adminphone = '$adminphone',
				adminemail = '$adminemail',
				adminpassword = '$adminpassword'
				WHERE adminid = '$adminid'";
		
			$result = mysqli_query($conn,$query);
			if ($result){
				echo "<script type='text/javascript'>alert('Edit success')</script>"; 
			    echo '<script type="text/javascript">
					window.location = "account(a).php"</script>';
				}
			else
				echo "<script type='text/javascript'>alert('Edit failed')</script>";
		}
?>
	
  <br>
    
  <div>
	<form method="post" action="editadmin.php">
		<h2>Updating Account Information.</h2> <br>
		
		<input type="hidden" name="adminid" value="<?php echo $row['adminid']; ?>">
		
		<label for="adminname">Name</label>	
		<input type="text" name="adminname" value="<?php echo $row['adminname']; ?>">
		
	  
		<label for="adminic">IC Number</label>
		<input type="text" name="adminic" value="<?php echo $row['adminic']; ?>">
		
		
		<label for="adminphone">Contact Number</label>
		<input type="text" name="adminphone" value="<?php echo $row['adminphone']; ?>">
		
		
		<label for="adminemail">Email</label>
		<input type="text" name="adminemail" value="<?php echo $row['adminemail']; ?>">
		
		
		<label for="adminpassword">Password</label>
		<input type="text" name="adminpassword" value="<?php echo $row['adminpassword']; ?>">
		
		
		<input type="submit" name="edit" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
				
    </form>
  </div>


</body>
</html>