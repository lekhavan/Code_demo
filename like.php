<?php
include_once('connection.php');
session_start();
// Lấy thông tin từ request
$userID = $_SESSION['us_id'];
$ideaID = $_POST["idea_id"];
$vote = $_POST['vote'];

// Kiểm tra xem user đã like hoặc dislike cho idea này chưa
$sql = "SELECT * FROM thumbs WHERE UserID = $userID AND IdeaID = $ideaID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
  // Nếu user chưa like hoặc dislike, thêm mới một bản ghi vào bảng Thumbs
  $sql = "INSERT INTO Thumbs (UserID, IdeaID, Vote) VALUES ($userID, $ideaID, $vote)";
  mysqli_query($conn, $sql);
} else {
  // Nếu user đã like hoặc dislike, cập nhật lại bản ghi trong bảng Thumbs
  $sql = "UPDATE Thumbs SET Vote = $vote WHERE UserID = $userID AND IdeaID = $ideaID";
  mysqli_query($conn, $sql);
}

// Truy vấn lại bảng Thumbs và in kết quả để kiểm tra
$sql = "SELECT * FROM thumbs WHERE UserID = $userID AND IdeaID = $ideaID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "Vote: " . $row['Vote'];

// Trở lại trang chủ hoặc trang chi tiết của idea đã like hoặc dislike
header("Location: index.php");
?>