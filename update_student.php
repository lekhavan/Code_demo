<!DOCTYPE html>
<html>
<head>
	<title>Update Student Page</title>
    <link rel="stylesheet" href="styleupdatestudent.css">
</head>
<body>
	<h1>Update Student Page</h1>
	<form method="post" action="update_student.php">
		<label for="password">Enter Password:</label>
		<input type="password" id="password" name="password" required><br><br>

		<label for="re_password">Re-enter Password:</label>
		<input type="password" id="re_password" name="re_password" required><br><br>

		<input type="submit" value="Update">
		<br>
		<button onclick="window.location.href='admin page.php'">Cancel</button>
	</form>

</body>
</html>
