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
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysql_real_escape_string($db, $_POST['username']);
      $mypassword = mysql_real_escape_string($db, $_POST['password']); 
      
      $query = "SELECT id FROM participant WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

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
