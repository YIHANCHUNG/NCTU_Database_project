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
    //echo "Connected". "<br>"

	if(isset($_POST['search']))
	{
		$keyword = mysqli_real_escape_string($connection, $_POST['keyword']);
		$tag = $_POST['tag'];
		$category = $_POST['category'];
		if($_POST['view_lower'] != '') {
		    $view_lower = $_POST['view_lower'];
		} else {
			$view_lower = 0;
		}
		if($_POST['view_upper'] != '') {
		    $view_upper = $_POST['view_upper'];
		} else {
			$view_upper = 2147483647;
		}
		if($_POST['like_lower'] != '') {
		    $like_lower = $_POST['like_lower'];
		} else {
			$like_lower = 0;
		}
		if($_POST['like_upper'] != '') {
		    $like_upper = $_POST['like_upper'];
		} else {
			$like_upper = 2147483647;
		}
		if($_POST['dislike_lower'] != '') {
		    $dislike_lower = $_POST['dislike_lower'];
		} else {
			$dislike_lower = 0;
		}
		if($_POST['dislike_upper'] != '') {
		    $dislike_upper = $_POST['dislike_upper'];
		} else {
			$dislike_upper = 2147483647;
		}
		
		if($category == 0) {
			if(count($tag) > 1) {
			    $sql = "SELECT * FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT * FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%' OR d.tags LIKE '%$keyword%')) as r WHERE r.video_id = s.video_id LIMIT 50";
		    } else {
			    $sql = "SELECT * FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT * FROM basic as b WHERE b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%') as b WHERE b.video_id = s.video_id LIMIT 50";
		    }
		} else {
			if(count($tag) > 1) {
			    $sql = "SELECT * FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT * FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%' OR d.tags LIKE '%$keyword%') AND d.category_id = $category) as r WHERE r.video_id = s.video_id LIMIT 50";
		    } else {
			    $sql = "SELECT * FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT * FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%') AND d.category_id = $category) as r WHERE r.video_id = s.video_id LIMIT 50";
		    }
		}
		
		$result = mysqli_query($connection, $sql);
		if($result != "")
			$queryResult = mysqli_num_rows($result);
		else
			$queryResult = 0;
		
		if($queryResult > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo $row['video_id']." ";
				echo $row['title']." ";
				echo $row['channel_title']." ";
				echo $row['publish_time']." ";
				echo $row['trending_date']." ";
				echo $row['views']." ";
                echo $row['likes']." ";
				echo $row['dislikes']." ";
				echo "<a href='https://www.youtube.com/watch?v=".$row['video_id']."' target='_blank'>access video</a><br>";
			}
		}
		else
		{
			echo "<br><br>&nbsp There are no results matching your search!";
		}
	}
?>
</div>
