<?php
// Kết nối tới cơ sở dữ liệu
include_once('connection.php');
// Lấy DocumentID từ yêu cầu GET
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Lấy thông tin document từ cơ sở dữ liệu
  $sql = "SELECT * FROM `documents` WHERE `DocumentID` = '$id'";
  $result = $conn->query($sql);
  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // Thiết lập các thông số của phản hồi HTTP
    header('Content-Type: ' . $row['FileType']);
    header('Content-Disposition: attachment; filename="' . $row['DocumentName'] . '"');
    // Gửi nội dung của document tới trình duyệt
    echo $row['FileContent'];
    exit;
  }
}
// Nếu không có DocumentID hợp lệ trong yêu cầu GET, chuyển hướng người dùng về trang document list
header('Location: index.php');
?>
