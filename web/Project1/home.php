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
<form action="gamerps.php">
  <div class="form-group">
    <label for="login">User Name:</label>
    <input type="login" class="form-control" id="login">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 


<form action="gamerps.php">
  User Name:<br>
  <input type="text" name="username">
  <br>
  Password:<br>
  <input type="text" name="password">
  <br><br>
  <input type="submit" class="btn btn-success btn-sm"> 
		<span class="glyphicon glyphicon-log-in"></span> Login</input>
	<input type="submit" class="btn btn-success btn-sm">
		<span class="glyphicon glyphicon-log-out"></span> Log-Out</input>
</form>
</div>

</body>
</html>
