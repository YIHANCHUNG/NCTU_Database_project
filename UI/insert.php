<?php
	include 'header.php';
?>

<div class="result-container">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "youtube_db";
    $connection = mysqli_connect($servername, $username, $password, $db) or die("Error " . mysqli_error($connection));

    if($_POST['video_id']!="" && $_POST['trending_date']!="" && $_POST['title']!="" && $_POST['channel_title']!="" && $_POST['publish_time']!="" &&  $_POST['views']!="" && $_POST['likes']!="" && $_POST['dislikes']!="" && $_POST['comment_count']!="" &&
	   is_numeric($_POST['views']) && is_numeric($_POST['likes']) && is_numeric($_POST['dislikes']) && is_numeric($_POST['comment_count']))
	{
	if(isset($_POST['insert']))
	{
		$video_id = mysqli_real_escape_string($connection, $_POST['video_id']);
        $trending_date = mysqli_real_escape_string($connection, $_POST['trending_date']);
        $title = mysqli_real_escape_string($connection, $_POST['title']); 
        $channel_title = mysqli_real_escape_string($connection, $_POST['channel_title']);
        $category_id = $_POST['category_id'];
        $publish_time = mysqli_real_escape_string($connection, $_POST['publish_time']);
        $tags = mysqli_real_escape_string($connection, $_POST['tags']);
        $views = $_POST['views'];
        $likes = $_POST['likes'];
        $dislikes = $_POST['dislikes'];
        $comment_count = $_POST['comment_count'];
        $thumbnail_link = mysqli_real_escape_string($connection, $_POST['thumbnail_link']);
        $comments_disabled = $_POST['comments_disabled'];
        $ratings_disabled = $_POST['ratings_disabled'];
        $video_error_or_removed = $_POST['video_error_or_removed'];
        $description = mysqli_real_escape_string($connection, $_POST['description']);
		
		$sql = "INSERT INTO basic (video_id, title, channel_title, publish_time) VALUES ('$video_id', '$title', '$channel_title', '$publish_time'); 
		INSERT INTO detail (video_id, category_id, tags, thumbnail_link, description) VALUES ('$video_id', $category_id, '$tags', '$thumbnail_link', '$description');
		INSERT INTO property (video_id, comments_disabled, ratings_disabled, video_error_or_removed) VALUES ('$video_id', $comments_disabled, $ratings_disabled, $video_error_or_removed);
		INSERT INTO statistic (video_id, trending_date, views, likes, dislikes, comment_count) VALUES ('$video_id', '$trending_date', $views, $likes, $dislikes, $comment_count)";
		
		$status = mysqli_multi_query($connection, $sql);
		if($status)
		{
            echo "Insert success";
        }
		else
		{
			echo "Something wrong! Try again!";
		}
	}
	}
	else 
	{
		echo "You may miss something or wrong input! Try again!";
	}
?>
</div>