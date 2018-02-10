<html>
<head>
	<title>Game Rock-Paper-Scissors</title>
	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<link rel="stylesheet" type="text/css" href="game.css">
</head>

<body>


<?php

$dbUrl = getenv('DATABASE_URL');

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
?>

<div class="container">
  <div class="page-header">
	<h1 class="display-3">Welcome To The Game!</h1> 
		<?php
			foreach ($db->query('SELECT name FROM  game') as $row)
			{
  				echo '<h2>' . $row['name'] . '</h2>';
  				echo '<br/>';
			}
		?>
		<form action="home.php">
  			 <button type="submit" class="btn btn-success btn-sm">
 			 <span class="glyphicon glyphicon-log-out"></span> Log-Out</button>
		</form> 
  </div>

<div class="row">
	<div class="column center">
	
	<?php 
	foreach ($db->query('SELECT totalgames FROM gameParticipants') as $row)
	{
  		echo '<h2> Total Games Played: ' . $row['totalgames'] . '</h2>';
	}
	?>
	
	<?php	
	foreach ($db->query('SELECT wins FROM gameParticipants') as $row)
	{
		echo '<h2> Total Wins: ' .  $row['wins'] . '</h2>';
	}
	?>
</div>

</body>
</html>