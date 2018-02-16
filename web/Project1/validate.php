<html>
<body>
<?php

require("dbConnect.php");

$db = get_db();
$user_name = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$query = "SELECT id, username, password, display_name, email FROM participant WHERE username= :user_name";
$statement = $db->prepare($query);

$statement->bindValue(':user_name', $user_name);

$statement->execute();
$rows = $statement->fetch();

if(isset($rows['username']))
{
	

if($rows['username'] == $user_name){
		if($rows['password'] == $password){
			header("Location: gamerps.php?userid=" . $rows['id'] );
			die();
		}
		else{
			header('Location: home.php?error=1');
			die();
		}
}
else{
	header('Location: home.php?error=2');
	die();
	}
}
else
header('Location: home.php?error=2');

?>

</body>
</html>