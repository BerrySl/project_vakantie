<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="stylesheet" href="includes/style.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<title>Blog</title>
</head>

<body>

<div id="main">
    <a href="logout.php" style="color: #b4eb7e;">LOG UIT</a>
    <a href="logged_in_posts.php" style="color: #b4eb7e;">ALLE POSTS</a>
    <a href="postAanmaken.php" style="color: #b4eb7e;">POST MAKEN</a><br>
	<h1>Blog</h1>
	<div id="blogPosts">
    <?php
    session_start();
	include ("includes/includes.php");
	$id = $_SESSION['Id'];
	$query = "SELECT blog_posts.*, tags.name, user.username FROM blog_posts
    JOIN blog_post_tags ON blog_post_tags.blog_post_id = blog_posts.id
    JOIN tags ON tags.id = blog_post_tags.tag_id
    JOIN user ON user.id = blog_posts.author_id
    WHERE blog_posts.author_id = $id";
    $blogs = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($blogs);
    if ($count == 0){
        echo "U heeft geen posts";
    }else{
        while ($row = mysqli_fetch_array($blogs))
	{
		$blogPosts = GetBlogPosts($id);
	
	foreach ($blogPosts as $post)
	{
		echo "<div class='post'>";
		echo "<h2>" . $post->title . "</h2>";
		echo "<p>" . $post->post . "</p";
		echo "<span class='footer'><br>gepost door: " . $post->author . " <br>Gepost Op: " . $post->datePosted . " <br>Tags: " . $post->tags . "</span>";
        echo "<br><a href='postwijzigen.php?PostId=".$row['id']."'>wijzigen</a>";
        echo "&nbsp;<a href='postverwijderen.php?PostId=".$row['id']."' onClick=\"return 
confirm('are you sure you want to delete??');\">verwijderen</a>";
        echo "</div>";
    }
}
    }
	?>
	</div>
</div>

</body>

</html>