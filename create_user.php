<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create User</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Create User</h1>
	<form action="create_user.php" method="post">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" required>

		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" required>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>

		<label for="department">Department:</label>
		<select name="department" id="department" required>
			<option value="">-- Select Department --</option>
			<option value="1">Sales</option>
			<option value="2">Marketing</option>
			<option value="3">Engineering</option>
			<option value="4">HR</option>
		</select>

		<label for="terms">Agree to Terms:</label>
		<input type="checkbox" name="terms" id="terms" required>

		<input type="submit" value="Create">
	</form>

	<?php
    include_once('connection.php');
		// Check if form submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Get form data
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$department = $_POST['department'];
			$terms = isset($_POST['terms']) ? 1 : 0;

            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

			// Prepare and bind statement
			$stmt = $conn->prepare("INSERT INTO Users (FirstName, LastName, Email, Password, AgreedToTerms, DepartmentID) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssii", $firstname, $lastname, $email, $password_hashed, $terms, $department);

			// Execute statement
			if ($stmt->execute()) {
				echo "<p>User created successfully!</p>";
			} else {
				echo "<p>Error creating user: " . $conn->error . "</p>";
			}

			// Close statement and connection
			$stmt->close();
			$conn->close();
		}
	?>
</body>
</html>
