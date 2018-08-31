<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 require('includes/includes.php');
 if(isset($_POST['submit'])){
  $title = $_POST['Title'];
  $post = $_POST['Post'];
  $date = date("Y-m-d");
  $id = $_SESSION['Id'];
  $sql = "INSERT INTO `blog_posts`(`title`, `post`, `author_id`, `date_posted`) VALUES ('$title','$post',$id,'$date')";
  $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  header('location:MijnPosts.php');
}
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="includes/style.css" >
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form class="form-signin" method="POST">
        <h2 class="form-signin-heading" style="color: #b4eb7e;">maak post</h2>
        <div class="input-group">
        <p style="color: #b4eb7e;">titel: </p>
	  <input type="text" id="Title" name="Title" class="form-control" placeholder="Title"  required>
	</div>
        <p style="color: #b4eb7e;">post: </p>
        <textarea id="Post" name="Post" class="form-control" placeholder="Post" required></textarea><br>
        <input type="submit" name="submit" value="verzenden">
      </form>
</body>
</html>