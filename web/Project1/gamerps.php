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
require("dbConnect.php");
session_start();
$db = get_db();
$userid = $_SESSION['userid'];
?>

<div class="container">
  <div class="page-header">
	<h1 class="display-3">Welcome To The Game!</h1> 
		<?php
			foreach ($db->query('SELECT name FROM  game') as $row)
			{
  				echo '<h2>' . $row['name'] . '</h2>';
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
			foreach ($db->query("SELECT display_name FROM  participant WHERE id='$userid' ") as $row)
			{
  				echo  $row['display_name'];
  				echo '<br/>';
			}
			echo "<a href='winlose.php?selection=1'><img src='http://markinternational.info/data/out/146/219894120-picture-of-fist.png' class='small' alt='Rock'></a> <br> <br>";
			echo "<a href='winlose.php?selection=2'><img src='https://jardimcoloridodatialiu.files.wordpress.com/2014/04/805a9-moldemc383o28129.jpg' class='small' alt='Paper'></a><br><br>";
			echo "<a href='winlose.php?selection=3'><img src='http://www.clker.com/cliparts/7/d/N/6/X/o/scissor-hand.svg' class='small' alt='Scissors'></a><br>";
	   ?>
	  </div>
	<div class ="column center">
	<p>COMPUTER</p>
		<img src="http://markinternational.info/data/out/146/219894120-picture-of-fist.png" class="small" alt="Rock"> <br><br>
		<img src="https://jardimcoloridodatialiu.files.wordpress.com/2014/04/805a9-moldemc383o28129.jpg" class="small" alt="Paper"><br><br>
		<img src="http://www.clker.com/cliparts/7/d/N/6/X/o/scissor-hand.svg" class="small" alt="Scissors"><br>
	</div>
</div>

</body>
</html>