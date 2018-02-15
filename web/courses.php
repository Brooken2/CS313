<?php

require("dbConnect.php");

$db = get_db();
$query = "SELECT id, number, name FROM course";
$stmt = $db->prepare($query);

//Bind any Parameters

$stmt->execute();

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
</head>
<body>
<h1>Courses</h1>

<ul>
	<?php 
	foreach($courses as $course){
		$number = $course['number'];
		$name = $course['name'];
		$id = $course['id'];
		
		echo"<li><p><a href='notes.php?course_id=$id'>$number - $name</a></p></li><br />";
	}
	?>
</ul>

</body>
</html>