<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="stylesss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="scripts.js"></script>
</head>
<header>
    <div class="logo">
        <img src="images/logo.jpg" alt="University Icon">
      </div>
<div class="searchbox">
    <input type="text" placeholder="Search for ...">
    <button type="submit"><i class="fa fa-search"></i></button>
  </div>
<div class="us-action">
    <a href="login.html">Login</a>
</div>
</header>
<body>
<div class="topic">
    <label id="btn-bar" for="nv-bar"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></label>
    <input type="checkbox" id="nv-bar">
    <div class="topic-contents">
    <?php
include_once('connection.php');
// Truy vấn cơ sở dữ liệu
$sql = "SELECT * FROM IdeaCategories";
$result = mysqli_query($conn, $sql);

// Hiển thị kết quả truy vấn
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row["CategoryName"] . "</p>";
    }
} else {
    echo "No topics have been added yet";
}

// Đóng kết nối
mysqli_close($conn);
?>
    </div>
</div>

<div class="idea">
  
  <div class="post">
    <div class="post-header">
      <div class="post-meta">
        <h4 class="username">Username</h4>
        <p class="timestamp">Timestamp</p>
      </div>
    </div>
    <div class="post-body">
      <p>Content of the post goes here.</p>
      <img class="post-image" src="images/logo.jpg">
    </div>
    <div class="post-footer">
      <button class="like-button"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></button>
      <button class="dislike-button"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></button>
      <button class="comment-button"><i class="fa fa-comment-o fa-lg" aria-hidden="true"></i></button>
    </div>
    <hr style="margin: 5px;">
    <div class="post-comments">
      <div class="comment">
        <div class="comment-header">
          <h4 class="username">Username</h4>
          <p class="timestamp">Timestamp</p>
        </div>
        <div class="comment-body">
          <p>Comment content goes here.</p>
        </div>
        <div class="comment-footer">
          <button class="like-button-cmt"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></button>
          <button class="dislike-button-cmt"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></button>
        </div>
        
      </div>
      <div class="comment">
        <div class="comment-header">
          <h4 class="username">Username</h4>
          <p class="timestamp">Timestamp</p>
        </div>
        <div class="comment-body">
          <p>Comment content goes here.</p>
        </div>
        <div class="comment-footer">
          <button class="like-button-cmt"><i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true"></i></button>
          <button class="dislike-button-cmt"><i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true"></i></button>
        </div>
      </div>
      
    </div>
    <form class="comment-form">
        <textarea class="comment-input" placeholder="Write a comment..."></textarea>
        <button class="comment-submit">Comment</button>
      </form>
  </div>

  </div>
</div>
<script>
var btnBar = document.getElementById("btn-bar");
var topic = document.querySelector(".topic");
var idea = document.querySelector(".idea");
var topicContents = document.querySelector(".topic-contents");

btnBar.addEventListener("click", function() {
  if (window.innerWidth <= 600) {
    if (topic.style.height == "40%") {
      topic.style.height = "6%";
      topic.style.width = "100%";
      idea.style.height = "94%";
      idea.style.width = "100%";
      topicContents.style.display = "none";
    } else {
      topic.style.height = "40%";
      topic.style.width = "100%";
      idea.style.height = "60%";
      idea.style.width = "100%";
      topicContents.style.display = "block";
    }
  } else {
    if (topic.style.width == "35%") {
      topic.style.width = "5%";
      topic.style.height = "100%";
      idea.style.width = "95%";
      idea.style.height = "100%";
      topicContents.style.display = "none";
    } else {
      topic.style.width = "35%";
      topic.style.height = "100%";
      idea.style.width = "65%";
      idea.style.height = "100%";
      topicContents.style.display = "block";
    }
  }
});
</script>


    
</body>
</html>