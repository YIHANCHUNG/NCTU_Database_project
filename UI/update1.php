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
		
		if($_POST['keyword']!="" && $_POST['year']!="" && $_POST['date']!="" && $_POST['month']!="" &&
		   is_numeric($_POST['year']) && is_numeric($_POST['date']) && is_numeric($_POST['month'])) 
	    {	
			$keyword = mysqli_real_escape_string($connection, substr($_POST['keyword'], -11));
			$year = substr($_POST['year'], -2);
			$date = $_POST['date']
			$month = $_POST['month']
			$tmp = $year.".".$date.".".$month;
			$time = mysqli_real_escape_string($connection, $tmp);
		    $sql = "SELECT b.video_id, trending_date, title, channel_title, category_id, publish_time, tags, views, likes, dislikes, comment_count, thumbnail_link, comments_disabled, ratings_disabled, video_error_or_removed, description
		            FROM basic as b, detail as d, statistic as s, property as p WHERE b.video_id = d.video_id AND b.video_id = s.video_id AND b.video_id = p.video_id AND b.video_id = '$keyword' AND s.trending_date = '$time'";
		    $result = mysqli_query($connection, $sql);
		    $queryResult = mysqli_num_rows($result);
		
		    if($queryResult > 0)
		    {
			    while($row = mysqli_fetch_assoc($result))
			    {
					echo "Try updating something";
				    $video_id = $row['video_id'];
				    $trending_date = $row['trending_date'];
                    $title = $row['title'];
                    $channel_title = $row['channel_title'];
                    $category_id = $row['category_id'];
                    $publish_time = $row['publish_time'];
                    $tags = $row['tags'];
                    $views = $row['views'];
                    $likes = $row['likes'];
                    $dislikes = $row['dislikes'];
                    $comment_count = $row['comment_count'];
                    $thumbnail_link = $row['thumbnail_link'];
                    $comments_disabled = $row['comments_disabled'];
                    $ratings_disabled = $row['ratings_disabled'];
                    $video_error_or_removed = $row['video_error_or_removed'];
                    $description = $row['description'];				
			    }
		    }
		    else 
		    {
			    echo "There are no results matching your search!";
				$video_id = "";
				$trending_date = "";
                $title = "";
                $channel_title = "";
                $category_id = "";
                $publish_time = "";
                $tags = "";
                $views = "";
                $likes = "";
                $dislikes = "";
                $comment_count = "";
                $thumbnail_link = "";
                $comments_disabled = "";
                $ratings_disabled = "";
                $video_error_or_removed = "";
                $description = "";
		    }
		}
		else
		{
			    echo "You may miss something or wrong input! Try again!";
				$video_id = "";
				$trending_date = "";
                $title = "";
                $channel_title = "";
                $category_id = "";
                $publish_time = "";
                $tags = "";
                $views = "";
                $likes = "";
                $dislikes = "";
                $comment_count = "";
                $thumbnail_link = "";
                $comments_disabled = "";
                $ratings_disabled = "";
                $video_error_or_removed = "";
                $description = "";
	    }

	?>	
</div>
	
	
<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
	<form action="update2.php" method="POST">
	    <div style="display:none">
		<input type="text" name="video_id" value="<?php echo $video_id; ?>"><br>
		trending date:
		<input type="text" name="trending_date" value="<?php echo $trending_date; ?>"><br>
		</div>
		title:
		<input type="text" name="title" value="<?php echo $title; ?>"><br>
		channel title:
		<input type="text" name="channel_title" value="<?php echo $channel_title; ?>"><br>
		category id:
		<input type="text" name="category_id" value="<?php echo $category_id; ?>"><br>
		publish time:
		<input type="text" name="publish_time" value="<?php echo $publish_time; ?>"><br>
		tags:<br>
		<textarea cols="50" rows="5" name="tags">
		<?php echo $tags; ?>
		</textarea><br>
		views:
		<input type="text" name="views" value="<?php echo $views; ?>">
		likes:
		<input type="text" name="likes" value="<?php echo $likes; ?>">
		dislkes:
		<input type="text" name="dislikes" value="<?php echo $dislikes; ?>">
		comment count:
		<input type="text" name="comment_count" value="<?php echo $comment_count; ?>"><br>
		thumbnail link:
		<input type="text" name="thumbnail_link" value="<?php echo $thumbnail_link; ?>"><br>
		comments disabled:
		<input type="text" name="comments_disabled" value="<?php echo $comments_disabled; ?>">
		ratings disabled:
		<input type="text" name="ratings_disabled" value="<?php echo $ratings_disabled; ?>">
		video error or removed:
		<input type="text" name="video_error_or_removed" value="<?php echo $video_error_or_removed; ?>"><br>
		description:<br>
		<textarea cols="50" rows="5" name="description">
		<?php echo $description; ?>
		</textarea><br>
		<button type="submit" name="update" value="update"></button>
	</form>	
    </div>
</div>
