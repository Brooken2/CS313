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
		<h1 class="display-3">Create A Account!</h1>    
  </div>

<?php
if($error == 1){
	echo '<h2 class="red">Please Enter a User Name</h2>';
}
else if($error == 2){
	echo '<h2 class="red">Please Enter a Password</h2>';
}
else if($error == 3){
	echo '<h2 class="red">Please Enter a Display Name</h2>';
}
else if($error == 4){
	echo '<h2 class="red">Please Enter a Email</h2>';
}

?>
<form action="createvalidate.php" method="post">
 	 <div class="form-group">
    		<label for="login">User Name:</label>
    		<input type="login" class="form-control" id="username" name="username">
  	</div>
  	<div class="form-group">
    		<label for="pwd">Password:</label>
    		<input type="password" class="form-control" id="password" name="password">
  	</div>
	<div class="form-group">
		<label for="dname">Display Name:</label>
    		<input type="text" class="form-control" id="dname" name="dname">
	</div>
	<div class="form-group">
		<label for="email">Email:</label>
    		<input type="email" class="form-control" id="email" name="email">
	</div>
  	<button type="submit" class="btn btn-success">
  			<span class="glyphicon glyphicon-log-in"></span> Login</button>
</form> 

</div>

</body>
</html>