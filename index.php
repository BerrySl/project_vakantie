<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<title>Blog</title>
</head>

<body>

<div id="main">
<?php
if(isset($_GET['logout'])){
	echo "<h4 style='color:white;'>je bent succesvol uitgelogd</h4>";
}
?>
	<br><a href="login.php">LOG IN</a><br>
	<h1>Blog</h1>
	<div id="blogPosts">
	<?php
	include ("includes/includes.php");
	
	$blogPosts = GetBlogPosts();
	
	foreach ($blogPosts as $post)
	{
		echo "<div class='post'>";
		echo "<h2>" . $post->title . "</h2>";
		echo "<p>" . $post->post . "</p";
		echo "<span class='footer'><br>Posted By: " . $post->author . " <br>Posted On: " . $post->datePosted . " <br>Tags: " . $post->tags . "</span";
		echo "</div>";
	}
	?>
	</div>
</div>

</body>

</html>