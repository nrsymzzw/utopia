<?php
	ob_start();
	$message = "";
	if ( isset ($_POST['login']))
	{
		$memberemail = $_POST['memberemail'];
		$memberpassword = $_POST['memberpassword'];
		if ($memberemail != "" && $memberpassword != "")
		{
			include 'dbconnect.php';
			mysqli_select_db($conn,'utopia');
			
			$sql = "SELECT memberemail FROM member
				WHERE memberemail = '$memberemail' AND memberpassword = '$memberpassword'";
			
			$result = mysqli_query($conn,$sql) or die('Query failed');
			
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			if (mysqli_num_rows($result) ==1)
			{
				session_start();
				$_SESSION['isLogged_in'] = true;
				$_SESSION['memberemail'] = $row['memberemail'];
				$message = 'Logged-in successfully';
				
				if ($_SESSION['memberemail'] = $row['memberemail'])
				header("Location: home(m).php");
			}
			else
			{
				$message = 'WRONG USERNAME OR PASSWORD';
			}
		}
		
		else
		{
			$message = 'PLEASE RE-INPUT YOUR USERNAME AND PASSWORD';
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
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
<body>
	
	<br><br><br><br><br>
	
	<div>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<h2>Login.</h2>
		
		<label>Email</label>
		<input type="text" name="memberemail">
		
		<label>Password</label>
		<input type="password" name="memberpassword">
		
		<input type="submit" name="login" value="Login">
		<input type="button" onClick="history.back()" value="Cancel">
		
		<p>
			<br>New member?<a href="register.php">&nbsp;Sign up</a> here.
		</p>
		
	</form>
	</div>
	
	<?php echo $message ?>								   

</body>
</html>