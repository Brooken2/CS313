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

<div class="header">
		<h1>Game</h1>
		<?php
			foreach ($db->query('SELECT name FROM  game') as $row)
			{
  				echo '<h2>' . $row['name'] . '</h2>';
  				echo '<br/>';
			}
		?>
</div>

<div class="row">
	<div class="column">
		<img src="http://markinternational.info/data/out/146/219894120-picture-of-fist.png" class="small" alt="Rock"> <br>
		<img src="https://jardimcoloridodatialiu.files.wordpress.com/2014/04/805a9-moldemc383o28129.jpg" class="small" alt="Paper"><br>
		<img src="http://www.clker.com/cliparts/7/d/N/6/X/o/scissor-hand.svg" class="small" alt="Scissors"><br>
	</div>	
	<div class ="column right">
		<img src="http://markinternational.info/data/out/146/219894120-picture-of-fist.png" class="small" alt="Rock"> <br>
		<img src="https://jardimcoloridodatialiu.files.wordpress.com/2014/04/805a9-moldemc383o28129.jpg" class="small" alt="Paper"><br>
		<img src="http://www.clker.com/cliparts/7/d/N/6/X/o/scissor-hand.svg" class="small" alt="Scissors"><br>
	</div>
</div>

<?php 

foreach ($db->query('SELECT display_name FROM  participant') as $row)
{
  echo 'Display Name: ' . $row['display_name'];
  echo '<br/>';
}
?>

</body>
</html>