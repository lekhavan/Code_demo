<!DOCTYPE html>
<html>
<head>
	<title>Student Page</title>
    <link rel="stylesheet" href="style_student_page.css">
</head>
<body>
	<?php
		// Student information
		$student_name = "Kha Van";
		$student_id = "19135";
		$avatar_url = "https://thuthuatnhanh.com/wp-content/uploads/2019/11/avatar-buon-ngau-cho-nam.jpg";
	?>

	<h1>Student Information</h1>
	<img src="<?php echo $avatar_url ?>" alt="Avatar">
	<h2><?php echo $student_name ?></h2>
	<p>Student ID: <?php echo $student_id ?></p>
    <br>
	<h1>My Topic</h1>
	<table>
		<tr>
			<th>Topic Id</th>
			<th>Topic Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th></th>
            <th></th>
		</tr>
		<tr>
			<td>6Dmakf7re</td>
			<td>WEB</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
			<td><button onclick="location.href='update_topic.php'" class="edit">Edit</button></td>
            <td><button class="delete">Delete</button></td>
		</tr>
	</table>
	<br>
	<button onclick="location.href='add_topic_page.php'" class="add">Add New Topic</button>
    <br>
    <h1>Topic Available</h1>
    <table>
        <tr>
            <th>Topic Id</th>
            <th>Topic Name</th>
            <th>Start Date</th>
			<th>End Date</th>
        </tr>
        <tr>
            <td>6Dmakf7re</td>
			<td>WEB</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
        </tr>
        <tr>
            <td>6Dmakf7re</td>
			<td>AI</td>
			<td>26-7-2022</td>
			<td>29-9-2022</td>
        </tr>
    </table>
</body>
</html>
