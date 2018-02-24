<html>
<body>
<?php

require("dbConnect.php");
session_start();
$db = get_db();

$user_name = htmlspecialchars($_POST['username']);
$password = $_POST['password'];
$passwordhash =  password_hash($password, PASSWORD_DEFAULT);
$dname = $_POST['dname'];
$email = $_POST['email'];

if(isset($user_name))
{
	if(isset($passwordhash)){
		if(isset($dname)){
			if(isset($email)){
				$random = "INSERT INTO participant(username, password, display_name, email) VALUES ('$user_name', '$passwordhash', '$dname', '$email')";
				$sta = $db->prepare($random);
				$sta->execute();
			}else{
				header('Location: createAccount.php?error=4');
				die();
			}
		}else{
			header('Location: createAccount.php?error=3');
			die();
		}
	}else{
		header('Location: createAccount.php?error=2');
		die();
	}
}else{
	header('Location: createAccount.php?error=1');
	die();
}

$query = "SELECT id, username, password, display_name, email FROM participant WHERE username= :user_name";
$statement = $db->prepare($query);
$statement->bindValue(':user_name', $user_name);

$statement->execute();
$rows = $statement->fetch();
$id = $rows['id'];

if(isset($rows['username'])){
	if($rows['username'] == $user_name){
		if(password_verify($password, $rows['password'])){
			$q = "INSERT INTO gameParticipants(participantId, gameId, totalGames, wins, tiedgames, losses) VALUES($id, 1, 0, 0, 0, 0)";
			$ment = $db->prepare($q);
			$ment->execute();
			$_SESSION['userid'] = $id;
			header("Location: gamerps.php");
			die();
		} else{
			header('Location: home.php?error=1');
			die();
		}
	}
else{
	header('Location: home.php?error=1');
	die();
	}
}
else
	header('Location: home.php?error=1');

?>
</body>
</html>