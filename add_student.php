<!DOCTYPE html>
<html>
<head>
	<title>Add New Student</title>
    <link rel="stylesheet" href="styleaddstudent.css">
</head>
<body>
	<h1>Add New Student</h1>
	<form action="process_student.php" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required>
		<br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required>
		<br>
		<label for="role">Role:</label>
		<input type="text" id="role" name="role" required>
		<br>
		<label for="faculty">Faculty:</label>
		<input type="text" id="faculty" name="faculty" required>
		<br>
		<input type="submit" value="Add Student">
        <br>
        <button onclick="location.href='admin page.php'">Back</button>
	</form>
</body>
</html>
