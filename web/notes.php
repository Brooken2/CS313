<?php

require("dbConnect.php");

$db = get_db();

$course_id = htmlspecialchars($_GET['course_id']);


$query = "SELECT id, number, name FROM course WHERE id=:course_id";
$stmt = $db->prepare($query);

$stmt->bindValue(':course_id', $course_id, PDO::PARAM_INT);

//Bind any Parameters

$stmt->execute();

$course = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
</head>
<body>
<?php 
		$number = $course['number'];
		$name = $course['name'];
		echo "<h1>Notes for $number - $name </h1>";
?>

<ul>
<li>Things will be here...</li>
</ul>
<h2>Enter a new note for this course</h2>
	<form method="post" action="insert_note.php">
	<input type="hidden" value="<?php $course_id?>" name="course_id">
		Date: <input type="date" name="date"><br />
		Content: <br />
		<textarea name="content"></textarea>
		<input type="submit" value="Create Note">
	</form>
</body>
</html>