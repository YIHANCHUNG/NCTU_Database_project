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

	if(isset($_POST['delete']))
	{
		$video_id = substr($_POST['keyword'], -11);
		
		$sql = "DELETE FROM detail WHERE video_id = '$video_id';
                DELETE FROM property WHERE video_id = '$video_id';
                DELETE FROM statistic WHERE video_id = '$video_id';
				DELETE FROM basic WHERE video_id = '$video_id'";
		
		$status = mysqli_multi_query($connection, $sql);
		if($status)
		{
            echo "Delete success";
        }
		else
		{
			echo "Something wrong! Try again!";
		}
	}
?>
</div>