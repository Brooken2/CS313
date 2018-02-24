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

$selection = $_GET['selection'];
$computerSelection = rand(1, 3);
$user = $_SESSION['userid'];

$win = "UPDATE gameparticipants SET totalGames = totalGames + 1,  wins = wins + 1 WHERE participantId = $user";
$tied = "UPDATE gameparticipants SET totalGames = totalGames + 1,  tiedgames = tiedgames + 1 WHERE participantId = $user";
$lost =  "UPDATE gameparticipants SET totalGames = totalGames + 1,  losses = losses + 1 WHERE participantId = $user";


$winstat = $db->prepare($win);
$tiedstat = $db->prepare($tied);
$loststat = $db->prepare($lost);

?>

<div class="container">
  <div class="page-header">
	<h1 class="display-3">Welcome To The Game!</h1> 
		<?php
		foreach ($db->query('SELECT name FROM game') as $row)
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

<?php 
if($selection == 1){
	if($computerSelection == 1){
		$tiedstat->execute();
		echo '<h2 class="red"> YOU TIED</h2>';
	}
	else if($computerSelection == 2){
		$loststat->execute();
		echo '<h2 class="red">You Lost</h2>';
	}
	else if($computerSelection == 3){
		$winstat->execute();
		echo '<h2 class="red"> YOU WIN</h2>';
	}
}
else if($selection == 2){
	if($computerSelection == 1){
		$winstat->execute();
		echo '<h2 class="red"> YOU WIN</h2>';
	}
	else if($computerSelection == 2){
	   $tiedstat->execute();
	   	echo '<h2 class="red"> YOU TIED</h2>';
	}
	else if($computerSelection == 3){
		$loststat->execute();
			echo '<h2 class="red">You Lost</h2>';
	}
}
else if($selection == 3){
	if($computerSelection == 1){
		$loststat->execute();
		echo '<h2 class="red">You Lost</h2>';
	}
	else if($computerSelection == 2){
		$winstat->execute();
		echo '<h2 class="red"> YOU WIN</h2>';
	}
	else if($computerSelection == 3){
		$tiedstat->execute();
		echo '<h2 class="red"> YOU TIED</h2>';
	}
}


foreach ($db->query("SELECT totalGames, wins, losses, tiedgames FROM gameParticipants WHERE participantId=$user") as $row)
{
		echo '<h2> Total Games Won: ' .  $row['wins'] . '</h2>';
		echo '<h2> Total Games Lost: ' . $row['losses'] . '</h2>';
		echo '<h2> Total Games Tied: ' . $row['tiedgames'] . '</h2>';
		echo '<h2> Total Games Played: ' . $row['totalgames'] . '</h2>';
}
	
echo"<a href='gamerps.php'>
			<button class='btn btn-success btn-sm'>Play Again</button>
			</a>";
?>
</body>
</html>