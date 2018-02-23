<html>
<body>
<?php

require("dbConnect.php");
session_start();

$db = get_db();
$user_name = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

$query = "SELECT id, username, password, display_name, email FROM participant WHERE username= :user_name";
$statement = $db->prepare($query);

$statement->bindValue(':user_name', $user_name);

$statement->execute();
$rows = $statement->fetch();

if(isset($rows['username']))
{
	

if($rows['username'] == $user_name){
		if(password_verify($password, $rows['password'])){
		$_SESSION['userid'] = $rows['id'];
			header("Location: gamerps.php" );
			die();
		}
		else{
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