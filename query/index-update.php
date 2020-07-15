<?php
	include 'header.php'
?>


<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">

		<form action="update1.php" method="POST">
		Search:
		<input type="text" name="keyword" placeholder="Insert video link"><br>
		<input type="text" name="year" placeholder="ex:2000">
		<input type="text" name="date" placeholder="ex:01">
		<input type="text" name="month" placeholder="ex:01">
		<button type="submit" name="search" value="search"></button><br>
		</form>
	
    </div>
</div>
