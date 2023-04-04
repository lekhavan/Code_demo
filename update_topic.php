<!DOCTYPE html>
<html>
<head>
	<title>Update Topic</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#datepicker1" ).datepicker();
			$( "#datepicker2" ).datepicker();
		} );
	</script>
    <link rel="stylesheet" href="styleupdatetopic.css">
</head>
<body>
	<h2>Update Topic</h2>
	<form method="post" action="">
		<label>First End Date Available:</label>
		<input type="text" name="date_available" value="2022-04-03" readonly><br><br>

		<label>Choose New First Ends Date:</label>
		<input type="text" id="datepicker1" name="new_date_start"><br><br>
        
        <label>Last End Date Available:</label>
		<input type="text" name="date_available" value="2023-04-03" readonly><br><br>

		<label>Choose New End Date:</label>
		<input type="text" id="datepicker2" name="new_date_end"><br><br>

		<input type="submit" name="update" value="Update">
		<input type="button" value="Back to Admin Page" onclick="location.href='admin page.php'">
	</form>
</body>
</html>

<?php
if(isset($_POST['update'])) {
	$date_available = $_POST['date_available'];
	$new_date_start = $_POST['new_date_start'];
	$new_date_end = $_POST['new_date_end'];

	// perform database update operation here

	echo "Topic date updated successfully!";
}
?>
