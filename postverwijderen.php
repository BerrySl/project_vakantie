<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 require('includes/includes.php');
 $ID = $_GET['PostId'];
  $sql = "DELETE FROM blog_posts WHERE id = $ID";
  $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  header('location:MijnPosts.php');
?>
<html>
<head>
</head>
<body>
</body>
</html>