<?php
	include 'header.php'
?>




<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
		<form action="Search.php" method="POST">
		<input type="text" name="keyword" placeholder="Insert keyword">
		<button type="submit" name="Search">Search</button>
      	<h1 class="w3-text-teal">Front page</h1>
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
		</form>
    </div>
</div>


</body>
</html>