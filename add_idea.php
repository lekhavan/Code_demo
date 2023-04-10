<form method="post" action="" enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" required>
  <br>

  <label for="description">Description:</label>
  <textarea name="description" id="description" required></textarea>
  <br>
  <label for="document">Document:</label>
  <input type="file" name="document" id="document">
  <br>
  <label for="submission_date">Submission date:</label>
  <input type="datetime-local" name="submission_date" id="submission_date" required>
  <br>

  <label for="closure_date">Closure date:</label>
  <input type="datetime-local" name="closure_date" id="closure_date" required>
  <br>

  <label for="final_closure_date">Final closure date:</label>
  <input type="datetime-local" name="final_closure_date" id="final_closure_date" required>
  <br>

  <label for="anonymous">Anonymous:</label>
  <input type="checkbox" name="anonymous" id="anonymous">
  <br>

  <label for="category">Category:</label>
  <select name="category" id="category" required>
    <option value="">Select a category</option>
    <?php
      // retrieve the list of categories from the database
      include_once('connection.php');
      $sql = "SELECT IdeaCategoryID, CategoryName FROM IdeaCategories";
      $result = $conn->query($sql);
      while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['IdeaCategoryID'] . '">' . $row['CategoryName'] . '</option>';
      }
    ?>
  </select>
  <br>

  <input type="submit" name="add-idea" value="Add Idea">
</form>
<?php
if(isset($_POST['add-idea'])){
  $title = $_POST['title'];
  $description = $_POST['description'];
  $submission_date = $_POST['submission_date'];
  $closure_date = $_POST['closure_date'];
  $final_closure_date = $_POST['final_closure_date'];
  $anonymous = isset($_POST['anonymous']) ? true : false;
  $category_id = $_POST['category'];
  $status=false;
  
  $_SESSION['user_id']='3';
  // connect to the database
  include_once('connection.php');
  
  // insert the data into the Ideas table
  $sql = "INSERT INTO Ideas (Title, Description, SubmissionDate, ClosureDate, FinalClosureDate, Anonymous, status, UserID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssiii", $title, $description, $submission_date, $closure_date, $final_closure_date, $anonymous, $status, $_SESSION['user_id']);
  $stmt->execute();
  $$idea_id = $stmt->insert_id;
  
  // check if a file was uploaded
  if ($_FILES["document"]["error"] > 0) {
    echo "Error: " . $_FILES["document"]["error"] . "<br>";
  } else {
    // Lưu tên file, loại file và nội dung của file vào cơ sở dữ liệu
    $fileType = $_FILES["document"]["type"];
    $fileContent = addslashes(file_get_contents($_FILES["document"]["tmp_name"]));
    $documentName = $_FILES["document"]["name"];
    
    $sql = "INSERT INTO `documents` (`FileType`, `FileContent`, `IdeaID`, `DocumentName`) 
            VALUES ('$fileType', '$fileContent', '$$idea_id', '$documentName')";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  
  // insert the data into the IdeaCategoryMapping table
  $sql = "INSERT INTO IdeaCategoryMapping (IdeaID, IdeaCategoryID) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $idea_id, $category_id);
  $stmt->execute();
  
  // redirect to the page showing all ideas
  exit();
}
?>
