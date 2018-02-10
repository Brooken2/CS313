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



foreach ($db->query('SELECT display_name FROM  participant') as $row)
{
  echo 'Display Name: ' . $row['display_name'];
  echo '<br/>';
}
?>


<img src="http://markinternational.info/data/out/146/219894120-picture-of-fist.png" class="img-circle small" alt="Rock">
<img src="https://jardimcoloridodatialiu.files.wordpress.com/2014/04/805a9-moldemc383o28129.jpg" class="img-circle small" alt="Paper">
<img src="http://www.clker.com/cliparts/7/d/N/6/X/o/scissor-hand.svg" class="img-circle" alt="Scissors">

</body>
</html>