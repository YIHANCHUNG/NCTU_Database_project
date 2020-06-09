<?php
	include 'header.php'
?>

<form action="Search.php" method="POST">
	<input type="text" name="keyword" placeholder="Insert keyword">
	<button type="submit" name="Search">Search</button>
</form>
<h1>Front page</h1>
<h2>All result</h2>

<div class="result-container">
	<?php
		$sql = "SELECT * FROM search";
		$result = mysqli_query($connection, $sql);
		$queryresult = mysqli_num_rows($result);
		if($queryresult > 0)
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
	?>
</div>
</body>
</html>