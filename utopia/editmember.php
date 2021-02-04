<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Information</title>

<style>
input[type=text], input[type=password] {
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
		if (isset($_GET['memberid']))
			$memberid = $_GET['memberid'];
		else
			$memberid = 0;
		
		include 'dbconnect.php';
		mysqli_select_db($conn,'utopia');

		$query = "SELECT memberid, membername, memberic, memberphone, memberemail, memberpassword FROM member WHERE memberid=$memberid";
		$result = mysqli_query($conn,$query) or die('SQL error');
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		
		//to edit data
		if (isset($_POST['edit']) && isset($_POST['memberid'])){
			$memberid = addslashes($_POST['memberid']);
			$membername = addslashes($_POST['membername']);
			$memberic = addslashes($_POST['memberic']);
			$memberphone = addslashes($_POST['memberphone']);
			$memberemail = addslashes($_POST['memberemail']);
			$memberpassword = addslashes($_POST['memberpassword']);		
						
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "UPDATE member SET
				memberid = '$memberid', 
				membername = '$membername', 
				memberic = '$memberic',
				memberphone = '$memberphone',
				memberemail = '$memberemail',
				memberpassword = '$memberpassword'
				WHERE memberid = '$memberid'";
		
			$result = mysqli_query($conn,$query);
			if ($result){
				echo "<script type='text/javascript'>alert('Edit success')</script>"; 
			    echo '<script type="text/javascript">
					window.location = "account.php"</script>';
				}
			else
				echo "<script type='text/javascript'>alert('Edit failed')</script>";
		}
?>
	
  <br>
  
  <div>
	<form method="post" action="editmember.php">
		<h2>Updating Account Information.</h2><br>
		
		<input type="hidden" name="memberid" value="<?php echo $row['memberid']; ?>">
			
		<label for="membername">Name</label>
		<input type="text" name="membername" value="<?php echo $row['membername']; ?>">
	  
		<label for="memberic">IC Number</label>
		<input type="text" name="memberic" value="<?php echo $row['memberic']; ?>">
		
		<label for="memberphone">Contact Number</label>
		<input type="text" name="memberphone" value="<?php echo $row['memberphone']; ?>">
		
		<label for="memberemail">Email</label>
		<input type="text" name="memberemail" value="<?php echo $row['memberemail']; ?>">
		
		<label for="memberpassword">Password</label>
		<input type="password" name="memberpassword" value="<?php echo $row['memberpassword']; ?>">
		
		<input type="submit" name="edit" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
		
    </form>
  </div>


</body>
</html>