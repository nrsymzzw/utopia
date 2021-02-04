<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>	
	
	<style>
	input[type=text], input[type=password]{
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

	h2, p{
		font-family: Arial;
	}

	div {
	  border-radius: 5px;
	  background-color: #eef0f7;
	  padding: 20px;
	  width: 450px;
	  margin-left: 430px;
	}
	
	a:link, a:visited {
		color: black;
		font-weight: bold;
		text-decoration: none;
	}
	</style>
</head>
	
<?php   
		//TO ADD DATA
		if (isset($_POST['add'])) {
			$membername = addslashes($_POST['membername']);
			$memberic = addslashes($_POST['memberic']);
			$memberphone = addslashes($_POST['memberphone']);
			$memberemail = addslashes($_POST['memberemail']);
			$memberpassword = addslashes($_POST['memberpassword']);
			
			
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$query = "INSERT INTO member (membername, memberic, memberphone, memberemail, memberpassword) VALUES
				('$membername', '$memberic', '$memberphone', '$memberemail', '$memberpassword')";
			
			$result = mysqli_query($conn,$query);
			
			if ($result) {
				echo "<script type='text/javascript'>alert('Add sucess')</script>";
				echo '<script type="text/javascript">
						window.location = "login.php"
					</script>';	}
			else
				echo "<script type='text/javascript'>alert('Add failed')</script>";
		}
?>
	
<body>

	<div>
	<form method="post" action="register.php">
		<h2>Sign Up.</h2><br>
		
		<label>Name</label>
		<input type="text" name="membername" required>
		
		<label>IC Number</label>
		<input type="text" name="memberic" required>
		
		<label>Contact Number</label>
		<input type="text" name="memberphone" required>
		
		<label>Email</label>
		<input type="text" name="memberemail" required>
	
		<label>Password</label>
		<input type="password" name="memberpassword" required>
	
		<input type="submit" name="add" value="Submit">
		<input type="button" onClick="history.back()" value="Cancel">
	
		<p>
			Already a member?<a href="login.php">&nbsp;Login</a> here.
		</p>
	</form>
	</div>
	
</body>
</html>