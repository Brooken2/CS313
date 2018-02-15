<?php
$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    chckusername($username, $password);
}

function chckusername($username, $password){

    $check = "SELECT * FROM participant WHERE username='$username'";
    $check_q = mysql_query($check) or die("<div class='loginmsg'>Error on checking Username<div>");

    if (mysql_num_rows($check_q) == 1) {
        chcklogin($username, $password);
    }
    else{
        echo "<div id='loginmsg'>Wrong Username</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assignment Links</title>
	<link rel="stylesheet" type="text/css" href="game.css">
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
</head>
<body>

<div class="container">
  <div class="page-header">
		<h1 class="display-3">Welcome To The Game!</h1>    
  </div>


<form action="gamerps.php" method="post">
 	 <div class="form-group">
    		<label for="login">User Name:</label>
    		<input type="login" class="form-control" id="login">
  	</div>
  	<div class="form-group">
    		<label for="pwd">Password:</label>
    		<input type="password" class="form-control" id="pwd">
  	</div>
  	<button type="submit" class="btn btn-success">
  			<span class="glyphicon glyphicon-log-in"></span> Login</button>
</form> 

</div>

</body>
</html>
