<?php

class BlogPost
{

public $id;
public $title;
public $post;
public $author;
public $tags;
public $datePosted;

function __construct($inId, $inTitle=null, $inPost=null, $inAuthorId=null, $inDatePosted=null)
{
	$connection = mysqli_connect('localhost', 'BlogGebruiker', 'OoJw2B5zMFApDPcf') or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = 'blog';
mysqli_select_db($connection, $database) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");
	if (!empty($inId))
	{
		$this->id = $inId;
	}
	if (!empty($inTitle))
	{
		$this->title = $inTitle;
	}
	if (!empty($inPost))
	{
		$this->post = $inPost;
	}

	if (!empty($inDatePosted))
	{
		$this->datePosted = $inDatePosted;
	}

	if (!empty($inAuthorId))
	{
		$query = mysqli_query($connection, "SELECT username FROM user WHERE id = " . $inAuthorId);
		$row = mysqli_fetch_assoc($query);
		$this->author = $row["username"];
	}

	$postTags = "No Tags";
	if (!empty($inId))
	{
		$query = mysqli_query($connection, "SELECT tags.* FROM blog_post_tags LEFT JOIN (tags) ON (blog_post_tags.tag_id = tags.id) WHERE blog_post_tags.blog_post_id = " . $inId);
		$tagArray = array();
		$tagIDArray = array();
		while($row = mysqli_fetch_assoc($query))
		{
			array_push($tagArray, $row["name"]);
			array_push($tagIDArray, $row["id"]);
		}
		if (sizeof($tagArray) > 0)
		{
			foreach ($tagArray as $tag)
			{
				if ($postTags == "No Tags")
				{
					$postTags = $tag;
				}
				else
				{
					$postTags = $postTags . ", " . $tag;
				}
			}
		}
	}
	$this->tags = $postTags;
}

}

?>