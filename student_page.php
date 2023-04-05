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
	<button onclick="location.href='add_article.php'" class="add">Add New Post</button>
    <br>
    <h1>Article Available</h1>
	<div class="form-container">
    <form action="process_article.php" method="GET"  enctype="multipart/form-data">
		<label for="title">Title: Website</label><br>
		
		<label for="content">Content: Website is great solutions for business!</label><br>

		<label for="topic">Topic: IT</label><br>

		<label for="status">Status: Waiting</label>

		<label for="comment">Comment: No comment</label>

	</form>
	<form action="process_article.php" method="GET"  enctype="multipart/form-data">
		<label for="title">Title: Website</label><br>
		
		<label for="content">Content: Website is great solutions for business!</label><br>

		<label for="topic">Topic: IT</label><br>

		<label for="status">Status: Waiting</label>

		<label for="comment">Comment: No comment</label>

	</form>
	<form action="process_article.php" method="GET"  enctype="multipart/form-data">
		<label for="title">Title: Website</label><br>
		
		<label for="content">Content: Website is great solutions for business!</label><br>

		<label for="topic">Topic: IT</label><br>

		<label for="status">Status: Waiting</label>

		<label for="comment">Comment: No comment</label>

	</form>
	<form action="process_article.php" method="GET"  enctype="multipart/form-data">
		<label for="title">Title: Website</label><br>
		
		<label for="content">Content: Website is great solutions for business!</label><br>

		<label for="topic">Topic: IT</label><br>

		<label for="status">Status: Waiting</label>

		<label for="comment">Comment: No comment</label>

	</form>
	</div><br><br>
	
	<form class="uploadimg">
  	<!-- form content here -->

  		<input type="file" id="image-upload" name="image-upload">

  		<button type="submit" class="add">Submit</button>
	</form>
</body>
</html>
