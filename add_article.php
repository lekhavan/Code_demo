<!DOCTYPE html>
<html>
<head>
	<title>Add Article</title>
    <link rel="stylesheet" href="styleaddarticle.css">
</head>
<body>
	<h1>Add Article</h1>
	<form action="process_article.php" method="POST" enctype="multipart/form-data">
		<label for="title">Title:</label><br>
		<input type="text" id="title" name="title"><br><br>

		<label for="content">Content:</label><br>
		<textarea id="content" name="content"></textarea><br><br>

		<label for="topic">Topic:</label><br>
		<select id="topic" name="topic">
			<option value="technology">Technology</option>
			<option value="health">Health</option>
			<option value="sports">Sports</option>
			<option value="entertainment">Entertainment</option>
		</select><br><br>

		<label for="pdf_file">PDF File:</label><br>
		<input type="file" id="pdf_file" name="pdf_file" accept=".pdf" required><br><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
