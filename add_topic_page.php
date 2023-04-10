<!DOCTYPE html>
<html>
<head>
	<title>Add Idea Category</title>
</head>
<body>
	<h1>Add Topic</h1>
	<form action="" method="post">
		<label for="name">Topic Name:</label>
		<input type="text" name="name" id="name" required>
		<br>
		<label for="description">Description:</label>
		<textarea name="description" id="description" required></textarea>
		<br>
		<input type="submit" name="add-topic" value="Add Topic">
	</form>
</body>
</html>

<?php
// get the values from the form submission
if(isset($_POST['add-topic'])){
	$name = $_POST['name'];
	$description = $_POST['description'];
	
	// connect to the database
	include_once('connection.php');
	
	// insert the data into the IdeaCategories table
	$sql = "INSERT INTO IdeaCategories (CategoryName, Description) VALUES (?, ?)";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ss", $name, $description);
	$stmt->execute();
	
	// redirect to the page showing all idea categories
	echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
	exit();
}

?>
