<!DOCTYPE html>
<html>
<head>
	<title>Add Article Topic</title>
	<link rel="stylesheet" href="addtopicstyle.css">
</head>
<body>
	<h2>Add Article Topic</h2>
	<form method="post" action="" enctype="multipart/form-data">
		<label>Topic Name:</label>
		<input type="text" name="topic_name" required><br><br>

		<label>Start Date Available:</label>
		<input type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" readonly><br><br>

		<label>End Date Available:</label>
		<input type="date" name="end_date" value="<?php echo date('Y-m-d', strtotime('+1 month')); ?>" readonly><br><br>

		<label>Choose File:</label>
		<input type="file" name="file"><br><br>

		<input type="submit" name="add_topic" value="Add Article Topic">
        <br>
		<input type="button" value="Back to Student Page" onclick="location.href='student_page.php'">
	</form>
</body>
</html>

<?php
if(isset($_POST['add_topic'])) {
	$topic_name = $_POST['topic_name'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$file = $_FILES['file'];

	// perform database insert operation and file upload here

	echo "Article topic added successfully!";
}
?>
