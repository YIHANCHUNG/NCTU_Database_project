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


    if($_POST['trending_date']!="" && $_POST['title']!="" && $_POST['channel_title']!="" && $_POST['publish_time']!="" &&  $_POST['views']!="" && $_POST['likes']!="" && $_POST['dislikes']!="" && $_POST['comment_count']!="" && $_POST['comments_disabled']!="" && $_POST['ratings_disabled']!="" && $_POST['video_error_or_removed']!="" &&
	   is_numeric($_POST['views']) && is_numeric($_POST['likes']) && is_numeric($_POST['dislikes']) && is_numeric($_POST['comment_count']) && is_numeric($_POST['comments_disabled']) && is_numeric($_POST['ratings_disabled']) && is_numeric($_POST['video_error_or_removed']))
	{
	if(isset($_POST['update']))
	{
		if($_POST['video_id'] != "") 
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
		
		$sql = "UPDATE basic, detail, statistic, property 
                SET basic.title='$title', basic.channel_title='$channel_title', basic.publish_time='$publish_time', 
                    detail.category_id=$category_id, detail.tags='$tags', detail.thumbnail_link='$thumbnail_link', detail.description='$description', 
	                property.comments_disabled=$comments_disabled, property.ratings_disabled=$ratings_disabled, property.video_error_or_removed=$video_error_or_removed, 
	                statistic.trending_date='$trending_date', statistic.views=$views, statistic.likes=$likes, statistic.dislikes=$dislikes, statistic.comment_count=$comment_count
                WHERE basic.video_id = detail.video_id AND basic.video_id = statistic.video_id AND basic.video_id = property.video_id AND basic.video_id = '$video_id'";
		
		$status = mysqli_query($connection, $sql);
		if($status)
		{
            echo "Update success";
        }
		else
		{
			echo "Something wrong! Try again!";
		}
		}
		else 
		{
			echo "Nothing Update";
		}
	}
	}
	else 
	{
		echo "You may miss something or wrong input! Try again!";
	}
?>
</div>