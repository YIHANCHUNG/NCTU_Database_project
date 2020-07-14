<?php
	include 'header.php'
?>


<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
		<form action="search2.php" method="POST">
		<input type="text" name="keyword" placeholder="Insert keyword">
		<input type="checkbox" name="tag[]" value="1">tag<br><br>
		<div style="display:none">
		<input type="checkbox" name="tag[]" value="2" checked>
		</div>
		category: <select name="category">
		<option value="0" selected> "None" </option>
		<option value="1"> "Film & Animation" </option> 
		<option value="2"> "Autos & Vehicles" </option> 
		<option value="10"> "Music" </option>  
		<option value="15"> "Pets & Animals" </option> 
		<option value="17"> "Sports" </option> 
		<option value="18"> "Short Movies" </option> 
		<option value="19"> "Travel & Events" </option>
		<option value="20"> "Gaming" </option>
		<option value="21"> "Videoblogging" </option>
		<option value="22"> "People & Blogs" </option>
		<option value="23"> "Comedy" </option>
		<option value="24"> "Entertainment" </option>
		<option value="25"> "News & Politics" </option>
		<option value="26"> "Howto & Style" </option>
		<option value="27"> "Education" </option>
		<option value="28"> "Science & Technology" </option>
		<option value="29"> "Nonprofits & Activism" </option>
		<option value="30"> "Movies" </option>
		<option value="31"> "Anime/Animation" </option>
		<option value="32"> "Action/Adventure" </option>
		<option value="33"> "Classics" </option>
		<option value="34"> "Comedy" </option>
		<option value="35"> "Documentary" </option>
		<option value="36"> "Drama" </option>
		<option value="37"> "Family" </option>
		<option value="38"> "Foreign" </option>
		<option value="39"> "Horror" </option>
		<option value="40"> "Sci-Fi/Fantasy" </option>
		<option value="41"> "Thriller" </option>
		<option value="42"> "Shorts" </option>
		<option value="43"> "Shows" </option>
		<option value="44"> "Trailers" </option>
		</select><br><br>
		view:
		<input type="text" name="view_lower" placeholder="lower">
		~
		<input type="text" name="view_upper" placeholder="upper"><br><br>
		like:
		<input type="text" name="like_lower" placeholder="lower">
		~
		<input type="text" name="like_upper" placeholder="upper"><br><br>
		dislike:
		<input type="text" name="dislike_lower" placeholder="lower">
		~
		<input type="text" name="dislike_upper" placeholder="upper"><br><br>
		<button type="submit" name="search" value="search">Summit</button>
	  	
		</form>
    </div>
</div>
