<?php
$error = $_GET['error'];
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

<?php
if($error == 1){
	echo '<h2 class="red">Wrong Username or Password: Try again</h2>';
}
?>
<form action="validate.php" method="post">
 	 <div class="form-group">
    		<label for="login">User Name:</label>
    		<input type="login" class="form-control" id="username" name="username">
  	</div>
  	<div class="form-group">
    		<label for="pwd">Password:</label>
    		<input type="password" class="form-control" id="password" name="password">
  	</div>
  	<button type="submit" class="btn btn-success">
  			<span class="glyphicon glyphicon-log-in"></span> Login</button>
	<button type="button" class="btn btn-success"><a href="createAccount.php">Create New Account</a></button>
</form> 

</div>

</body>
</html>
