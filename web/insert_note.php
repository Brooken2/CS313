<?php

require("dbConnect.php");

$db = get_db();

$course_id = $_POST['course_id'];
$date = $_POST['date'];
$content = $_POST['content'];

var_dump($course_id);
var_dump($date);
var_dump($content);
 //do INSERT INTO query here...
 //make sure to bind the parameters
 
 header('Location: notes.php');
 die();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
</head>
<body>
<h1>Courses</h1>

</body>
</html>