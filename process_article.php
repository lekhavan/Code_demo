<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data
	$title = $_POST["title"];
	$content = $_POST["content"];
	$topic = $_POST["topic"];

	// Check if a PDF file was uploaded
	if ($_FILES["pdf_file"]["error"] == UPLOAD_ERR_OK) {
		// Get the file name and extension
		$file_name = $_FILES["pdf_file"]["name"];
		$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

		// Check if the file extension is valid
		if ($file_ext != "pdf") {
			echo "Error: Only PDF files are allowed.";
			exit;
		}

		// Generate a unique file name
		$unique_name = uniqid() . "." . $file_ext;

		// Move the uploaded file to a new location
		if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], "uploads/" . $unique_name)) {
			// File was uploaded successfully
			echo "Article submitted successfully.";
		} else {
			echo "Error uploading file.";
		}
	} else {
		echo "Error uploading file.";
	}
}
?>
