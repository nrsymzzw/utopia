<!DOCTYPE html>
<html>
<head>
	<title>Utopia Book Club</title>

<style>
body {
  margin: 0;
}

h1.a {
	font-size: 28px;
	font-family: Arial;
}

h4, p {
	font-family: Arial;
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
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

</style>
</head>
<body>

<br>

<ul>
  <li><img src="image/books2.gif" alt="Books" width="150" height="150"></li>
  <li><a href="home(m).php">Home</a></li>
  <li><a class="active">Contact</a></li>
  <li><a href="eventmember.php">Event</a></li>
  <li><a href="account.php">Account</a></li>
  <li><a href="home.php">Logout</a></li>
</ul>

<div style="margin-left:18%;padding:1px 16px;height:400px;">
  <h1 class="a">Contact Us Here.</h1>
  
  <br>
  
  <div class="card">
	  <div class="container" style="background-color: #4267B2; color: white;">
		<h4>@utopiabookclub</h4> 
		<p>Facebook</p> 
	  </div>
	</div>
	
	<br>
	<div class="card">
	  <div class="container" style="background-color: #1DA1F2; color: white;">
		<h4><b>@utopiabookclub</b></h4> 
		<p>Twitter</p> 
	  </div>
	</div>
	
	<br>
	<div class="card">
	  <div class="container" style="background-color: #C13584; color: white;">
		<h4><b>@utopiabookclub</b></h4> 
		<p>Instagram</p> 
	  </div>
	</div>
	
	<br>
	<div class="card">
	  <div class="container" style="background-color: #34A853; color: white;">
		<h4><b>012-3456789</b></h4> 
		<p>WhatsApp / Call</p> 
	  </div>
	</div>

</div>

</body>
</html>
