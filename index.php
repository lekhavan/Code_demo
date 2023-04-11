<?php
session_start();
include_once("connection.php");
?>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<header>
  <div class="logo">
    <a href="index.php"><img src="images/logo.jpg" alt="University Icon"></a>
  </div>
  <div class="searchbox">
    <input type="text" placeholder="Search for ...">
    <button type="submit"><i class="fa fa-search"></i></button>
  </div>
  <div class="us-action">
    <?php
    if (isset($_SESSION['email']) && $_SESSION['email'] != null) { ?>
      <a href="#">
        <?php echo $_SESSION['email']; ?>
      </a>
    <?php } else {
      ?>
      <a href="login page.php">Login</a>
    <?php } ?>
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
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<p>" . $row["CategoryName"] . "</p>";
        }
      } else {
        echo "No topics have been added yet";
      }
      ?>
    </div>
  </div>

  <div class="idea">
    <?php
    $idea_sql = "SELECT Users.Email,Ideas.IdeaID, Ideas.SubmissionDate, Ideas.Description, SUM(CASE WHEN Thumbs.Vote = 1 THEN 1 ELSE 0 END) AS Likes, SUM(CASE WHEN Thumbs.Vote = 0 THEN 1 ELSE 0 END) AS Dislikes
  FROM Ideas
  INNER JOIN Users ON Ideas.UserID = Users.UserID
  LEFT JOIN Thumbs ON Ideas.IdeaID = Thumbs.IdeaID
  GROUP BY Ideas.IdeaID, Users.Email, Ideas.SubmissionDate, Ideas.Description
  ORDER BY Ideas.SubmissionDate DESC";
    $idea_result = mysqli_query($conn, $idea_sql);
    if (mysqli_num_rows($idea_result) > 0) {
      while ($idea_row = mysqli_fetch_assoc($idea_result)) {
        ?>

        <div class="post">
          <div class="post-header">
            <div class="post-meta">
              <h4 class="username">
                <?php echo $idea_row['Email']; ?>
              </h4>
              <p class="timestamp">
                <?php echo $idea_row['SubmissionDate']; ?>
              </p>
            </div>
          </div>
          <div class="post-body">
            <p>
              <?php echo $idea_row['Description']; ?>
            </p>
            <?php
            // Kết nối tới cơ sở dữ liệu
            include_once('connection.php');
            // Lấy danh sách các document từ cơ sở dữ liệu
            $IdeaID = $idea_row['IdeaID'];
            $sql = "SELECT * FROM documents where IdeaID = $IdeaID";
            $result = $conn->query($sql);
            // Hiển thị danh sách document
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $filename = $row['DocumentName'];
                $filetype = pathinfo($filename, PATHINFO_EXTENSION);
                if (in_array(strtolower($filetype), array('jpg', 'jpeg', 'png', 'gif'))) {
                  // Nếu document là hình ảnh thì sử dụng thẻ img
                  ?>
                  <img class="post-image" src="images/<?php echo $filename; ?>" alt="<?php echo $filename; ?>">
                  <?php
                } else {
                  // Nếu không phải hình ảnh thì sử dụng thẻ a để tải xuống file
                  ?>
                  <div class="post-document">
                    <a href="download.php?id=<?php echo $row['DocumentID']; ?>"><?php echo $filename; ?></a>
                  </div>
                  <?php
                }
              }
            }
            ?>
          </div>
          <div class="post-footer">
            <button class="like-button" data-ideaid="<?php echo $idea_row['IdeaID']; ?>">
              <i class="fa fa-thumbs-o-up fa-lg" aria-hidden="true">
                <?php echo $idea_row['Likes']; ?>
              </i>
            </button>
            <button class="dislike-button" data-ideaid="<?php echo $idea_row['IdeaID']; ?>">
              <i class="fa fa-thumbs-o-down fa-lg" aria-hidden="true">
                <?php echo $idea_row['Dislikes']; ?>
              </i>
            </button>
            <button class="comment-button"><i class="fa fa-comment-o fa-lg" aria-hidden="true"></i></button>
          </div>
          <hr style="margin: 5px;">
          <div class="post-comments">

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
          <form class="comment-form">
            <textarea class="comment-input" placeholder="Write a comment..."></textarea>
            <button class="comment-submit">Comment</button>
          </form>
        </div>


        <?php
      }
    }
    ?>
  </div>

  </div>
  </div>
  <script>
    var btnBar = document.getElementById("btn-bar");
    var topic = document.querySelector(".topic");
    var idea = document.querySelector(".idea");
    var topicContents = document.querySelector(".topic-contents");

    btnBar.addEventListener("click", function () {
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
<script>
 $(document).ready(function() {
  $('.like-button').click(function() {
    var idea_id = $(this).data('ideaid');
    $.ajax({
      url: 'like.php',
      type: 'POST',
      data: {
        idea_id: idea_id,
        vote: 1
      },
      success: function(result) {
        // Cập nhật số lượng like hiển thị trên trang
        $('.idea-' + idea_id + ' .like-count').text(result);
        location.reload();
      }
    });
  });
  
  $('.dislike-button').click(function() {
    var idea_id = $(this).data('ideaid');
    $.ajax({
      url: 'like.php',
      type: 'POST',
      data: {
        idea_id: idea_id,
        vote: 0
      },
      success: function(result) {
        // Cập nhật số lượng dislike hiển thị trên trang
        $('.idea-' + idea_id + ' .dislike-count').text(result);
        location.reload();
      }
    });
  });
});

  </script>


</body>

</html>