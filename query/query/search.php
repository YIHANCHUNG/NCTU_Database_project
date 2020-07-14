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
	
	if(is_numeric($_POST['view_lower']) && is_numeric($_POST['view_upper']) && is_numeric($_POST['like_lower']) && is_numeric($_POST['like_upper']) && is_numeric($_POST['dislike_lower']) && is_numeric($_POST['dislike_upper'])) 
	{	   
	if(isset($_POST['search']))
	{
		$keyword = mysqli_real_escape_string($connection, $_POST['keyword']);
		$tag = $_POST['tag'];
		$category = $_POST['category'];
		$view_lower = $_POST['view_lower'];
        $view_upper = $_POST['view_upper'];
		$like_lower = $_POST['like_lower'];
        $like_upper = $_POST['like_upper'];
        $dislike_lower = $_POST['dislike_lower'];
        $dislike_upper = $_POST['dislike_upper'];

		
		if($category == 0) {
			if(count($tag) > 1) {
			    $sql = "SELECT r.*, s.trending_date, s.views, s.likes, s.dislikes FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT b.*, d.tags, d.category_id FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%' OR d.tags LIKE '%$keyword%')) as r WHERE r.video_id = s.video_id LIMIT 50";
		    } else {
			    $sql = "SELECT r.*, s.trending_date, s.views, s.likes, s.dislikes FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT b.*, d.tags, d.category_id FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%')) as r WHERE r.video_id = s.video_id LIMIT 50";
		    }
		} else {
			if(count($tag) > 1) {
			    $sql = "SELECT r.*, s.trending_date, s.views, s.likes, s.dislikes FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT b.*, d.tags, d.category_id FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%' OR d.tags LIKE '%$keyword%') AND d.category_id = $category) as r WHERE r.video_id = s.video_id LIMIT 50";
		    } else {
			    $sql = "SELECT r.*, s.trending_date, s.views, s.likes, s.dislikes FROM (SELECT * FROM statistic WHERE views BETWEEN $view_lower AND $view_upper AND likes BETWEEN $like_lower AND $like_upper AND dislikes BETWEEN $dislike_lower AND $dislike_upper) as s, (SELECT b.*, d.tags, d.category_id FROM basic as b, detail as d WHERE b.video_id = d.video_id AND (b.title LIKE '%$keyword%' OR b.channel_title LIKE '%$keyword%') AND d.category_id = $category) as r WHERE r.video_id = s.video_id LIMIT 50";
		    }
		}
		
		$result = mysqli_query($connection, $sql);
		$queryResult = mysqli_num_rows($result);
		if($queryResult > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo $row['video_id']." ";
				echo $row['title']." ";
				echo $row['channel_title']." ";
				echo $row['publish_time']." ";
				echo $row['tags']." ";
				switch($row['category_id']) {
					case 1:
					    echo "Film & Animation"." ";
					    break;
					case 2:
					    echo "Autos & Vehicles"." ";
					    break;
					case 10:
					    echo "Music"." ";
					    break;
					case 15:
					    echo "Pets & Animals"." ";
					    break;
					case 17:
					    echo "Sports"." ";
					    break;
					case 18:
					    echo "Short Movies"." ";
					    break;
					case 19:
					    echo "Travel & Events"." ";
					    break;
					case 20:
					    echo "Gaming"." ";
					    break;
					case 21:
					    echo "Videoblogging"." ";
					    break;
					case 22:
					    echo "People & Blogs"." ";
					    break;
					case 23:
					    echo "Comedy"." ";
					    break;
					case 24:
					    echo "Entertainment"." ";
					    break;
					case 25:
					    echo "News & Politics"." ";
					    break;
					case 26:
					    echo "Howto & Style"." ";
					    break;
					case 27:
					    echo "Education"." ";
					    break;
					case 28:
					    echo "Science & Technology"." ";
					    break;
					case 29:
					    echo "Nonprofits & Activism"." ";
					    break;
					case 30:
					    echo "Movies"." ";
					    break;
					case 31:
					    echo "Anime/Animation"." ";
					    break;
					case 32:
					    echo "Action/Adventure"." ";
					    break;
					case 33:
					    echo "Classics"." ";
					    break;
					case 34:
					    echo "Comedy"." ";
					    break;
					case 35:
					    echo "Documentary"." ";
					    break;
					case 36:
					    echo "Drama"." ";
					    break;
					case 37:
					    echo "Family"." ";
					    break;
					case 38:
					    echo "Foreign"." ";
					    break;
					case 39:
					    echo "Horror"." ";
					    break;
					case 40:
					    echo "Sci-Fi/Fantasy"." ";
					    break;
					case 41:
					    echo "Thriller"." ";
					    break;
					case 42:
					    echo "Shorts"." ";
					    break;
					case 43:
					    echo "Shows"." ";
					    break;
					case 44:
					    echo "Trailers"." ";
					    break;	
				}
				echo $row['trending_date']." ";
				echo $row['views']." ";
                echo $row['likes']." ";
				echo $row['dislikes']." ";
				echo "<a href='https://www.youtube.com/watch?v=".$row['video_id']."' target='_blank'>access video</a><br>";
			}
		}
		else
		{
			echo "There are no results matching your search!";
		}
	}
	}
	else
	{
		echo "Wrong input! Try again!";
	}
?>
</div>