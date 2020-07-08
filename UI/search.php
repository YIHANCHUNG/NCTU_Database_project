<?php
	include 'header.php';
?>

<h1>Search Page</h1>
<div class="result-container">

<?php
	if(isset($_POST['Search']))
	{
		$search = mysqli_real_escape_string($connection, $_POST['keyword']);
		$sql = "SELECT * FROM search WHERE s_keyword LIKE '%$search%' OR s_text LIKE '%$search%' OR s_cName LIKE '%$search%' OR s_date LIKE '%$search%' ";
		$result = mysqli_query($connection, $sql);
		$queryResult = mysqli_num_rows($result);

		if($queryResult > 0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<div class='result-box'>
					<h3>".$row['s_keyword']."</h3>
					<p>".$row['s_text']."</p>
					<p>".$row['s_cName']."</p>
					<p>".$row['s_date']."</p>
				</div>";
			}
		}
		else
		{
			echo "There are no results matching your search!";
		}
	}
?>

</div>

