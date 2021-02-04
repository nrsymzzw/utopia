<!DOCTYPE html>
<html>
<head>
	<title>Utopia Book Club</title>
	
	<style>
		body {
		  margin: 0;
		}
		
		h2.a {
			font-family: "Times New Roman", Times, serif;
			font-size: 30px;
			text-align: center;
		}
		
		p {
			text-align: center;
			font-family: Arial;
		}

		ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  width: 20%;
		  background-color: #f1f1f1;
		  position: fixed;
		  height: 100%;
		  overflow: auto;
		}

		li a {
		  display: block;
		  color: #000;
		  padding: 28px 16px;
		  text-decoration: none;
		  font-size: 20px;
		}

		li a.active {
		  background-color: #4CAF50;
		  color: white;
		}

		li a:hover:not(.active) {
		  background-color: #555;
		  color: white;
		}

		img {
		  display: block;
		  margin-left: auto;
		  margin-right: auto;
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
		  margin-left: 470px;
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

		.button2 {
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

		.button2 span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button2 span:after {
		  content: '\00bb';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}

		.button2:hover span {
		  padding-right: 25px;
		}

		.button2:hover span:after {
		  opacity: 1;
		  right: 0;
		}
		
		a:link, a:visited {
			color: black;
			text-decoration: none;
		}
	</style>
</head>

<body >


<div style="padding:1px 16px; height:400px; margin-top: 100px;">
		
		<img src="image/flying.gif" alt="Reading Books" width="200" height="200">
		
		
		<h2 class="a">Entering the Utopia Book Club</h2> <br>
		
		<button class="button" style="vertical-align:middle"><span><a href="login(a).php"><b>Admin </b></a></span></button>

		<button class="button2" style="vertical-align:middle"><span><a href="login.php"><b>Member</b></a></span></button>
</div>

</body>
</html>
