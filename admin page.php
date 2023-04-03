<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
	<h1>Welcome Admin</h1>
	<br>
	<h1>Information Of Student Table</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Faculty</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<tr>
			<td>John Smith</td>
			<td>john@example.com</td>
			<td>Student</td>
			<td>Science</td>
			<td><button onclick="location.href='update_student.php'" class="edit">Edit</button></td>
			<td><button class="delete">Delete</button></td>
		</tr>
		<tr>
			<td>Jane Doe</td>
			<td>jane@example.com</td>
			<td>Teacher</td>
			<td>Arts</td>
			<td><button onclick="location.href='update_student.php'" class="edit">Edit</button></td>
			<td><button class="delete">Delete</button></td>
		</tr>
		<tr>
			<td>Mark Johnson</td>
			<td>mark@example.com</td>
			<td>Student</td>
			<td>Engineering</td>
			<td><button onclick="location.href='update_student.php'" class="edit">Edit</button></td>
			<td><button class="delete">Delete</button></td>
		</tr>
		<tr>
			<td>Sara Lee</td>
			<td>sara@example.com</td>
			<td>Student</td>
			<td>Business</td>
			<td><button onclick="location.href='update_student.php'" class="edit">Edit</button></td>
			<td><button class="delete">Delete</button></td>
		</tr>
	</table>
	<br>
	<button onclick="location.href='add_student.php'" class="add">Add New Student</button>
	<br>
	<h1>Topic Table</h1>
	<table>
		<tr>
			<th>Topic Id</th>
			<th>Topic Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th></th>
		</tr>
		<tr>
			<td>6Dmakf7re</td>
			<td>AI</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
			<td><button onclick="location.href='update_topic.php'" class="edit">Edit</button></td>
		</tr>
		<tr>
			<td>6Dmakf7re</td>
			<td>IOT</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
			<td><button onclick="location.href='update_topic.php'" class="edit">Edit</button></td>
		</tr>
		<tr>
			<td>6Dmakf7re</td>
			<td>WEB</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
			<td><button onclick="location.href='update_topic.php'" class="edit">Edit</button></td>
		</tr>
	</table>
	<br>
	<button onclick="location.href='add_topic.php'" class="add">Add New Topic</button>
	<br>
</body>
</html>
