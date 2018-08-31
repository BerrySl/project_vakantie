<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 require('includes/includes.php');
 $ID = $_GET['PostId'];
 if(isset($_POST['submit'])){
  $title = $_POST['Title'];
  $post = $_POST['Post'];
  $sql = "UPDATE blog_posts SET title='$title', post='$post' WHERE id = $ID";
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
  <?php
  $sql = "SELECT * FROM blog_posts WHERE id = $ID";
  $blogPosts = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  while ($row = mysqli_fetch_array($blogPosts))
	{
    $title = $row['title'];
    $post = $row['post'];
  }
  ?>
<form class="form-signin" method="POST">
        <h2 class="form-signin-heading" style="color: #b4eb7e;">wijzig post</h2>
        <div class="input-group">
        <p style="color: #b4eb7e;">titel: </p>
	  <input type="text" id="Title" name="Title" class="form-control" placeholder="Title" value="<?php echo $title; ?>"  required>
	</div>
        <p style="color: #b4eb7e;">post: </p>
        <textarea id="Post" name="Post" class="form-control" placeholder="Post" required><?php echo $post; ?></textarea><br>
        <input type="submit" name="submit" value="Wijzig">
      </form>
</body>
</html>