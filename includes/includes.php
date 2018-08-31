<?php
include 'blogpost.php';

// Change this info so that it works with your system.
$connection = mysqli_connect('localhost', 'BlogGebruiker', 'OoJw2B5zMFApDPcf') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = 'blog';
mysqli_select_db($connection, $database) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetBlogPosts($inAuthorId=null, $inId=null, $inTagId =null)
{
	$connection = mysqli_connect('localhost', 'BlogGebruiker', 'OoJw2B5zMFApDPcf') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
	$database = 'blog';
	mysqli_select_db($connection, $database) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");	if (!empty($inId))
	{
		echo "4";
		$query = mysqli_query($connection, "SELECT * FROM blog_posts WHERE id = " . $inId . " ORDER BY id DESC"); 
	}
	else if (!empty($inTagId))
	{
		echo "2";
		$query = mysqli_query($connection, "SELECT blog_posts.* FROM blog_post_tags LEFT JOIN (blog_posts) ON (blog_post_tags.postID = blog_posts.id) WHERE blog_post_tags.tagID =" . $tagID . " ORDER BY blog_posts.id DESC");
	}
	else
	{
		$sql = "SELECT * FROM blog_posts ORDER BY id DESC";
		$result = mysqli_query($connection, $sql);
		$postArray = array();
	while ($row = mysqli_fetch_array($result))
	{
		$myPost = new BlogPost($row["id"], $row['title'], $row['post'], $row["author_id"], $row['date_posted']);
		array_push($postArray, $myPost);
	}
	return $postArray;
	}
}
?>