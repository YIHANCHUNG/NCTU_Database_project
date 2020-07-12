<?php
	include 'header.php'
?>


<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
		<form action="search.php" method="POST">
		<input type="text" name="keyword" placeholder="Insert keyword">
		<input type="checkbox" name="tag[]" value="1">tag<br>
		<div style="display:none">
		<input type="checkbox" name="tag[]" value="2" checked>
		</div>
		<select name="category">
		<option value="0" selected> "None" </option>
		<option value="1"> "Film & Animation" </option> 
		<option value="2"> "Autos & Vehicles" </option> 
		<option value="3"> "Music" </option>  
		<option value="4"> "Pets & Animals" </option> 
		<option value="5"> "Sports" </option> 
		<option value="6"> "Short Movies" </option> 
		<option value="7"> "Travel & Events" </option>
		<option value="8"> "Gaming" </option>
		<option value="9"> "Videoblogging" </option>
		<option value="10"> "People & Blogs" </option>
		<option value="11"> "Comedy" </option>
		<option value="12"> "Entertainment" </option>
		<option value="13"> "News & Politics" </option>
		<option value="14"> "Howto & Style" </option>
		<option value="15"> "Education" </option>
		<option value="16"> "Science & Technology" </option>
		<option value="17"> "Nonprofits & Activism" </option>
		<option value="18"> "Movies" </option>
		<option value="19"> "Anime/Animation" </option>
		<option value="20"> "Action/Adventure" </option>
		<option value="21"> "Classics" </option>
		<option value="22"> "Comedy" </option>
		<option value="23"> "Documentary" </option>
		<option value="24"> "Drama" </option>
		<option value="25"> "Family" </option>
		<option value="26"> "Foreign" </option>
		<option value="27"> "Horror" </option>
		<option value="28"> "Sci-Fi/Fantasy" </option>
		<option value="29"> "Thriller" </option>
		<option value="30"> "Shorts" </option>
		<option value="31"> "Shows" </option>
		<option value="32"> "Trailers" </option>
		</select><br>
		view:
		<input type="text" name="view_lower" placeholder="lower">
		~
		<input type="text" name="view_upper" placeholder="upper"><br>
		like:
		<input type="text" name="like_lower" placeholder="lower">
		~
		<input type="text" name="like_upper" placeholder="upper"><br>
		dislike:
		<input type="text" name="dislike_lower" placeholder="lower">
		~
		<input type="text" name="dislike_upper" placeholder="upper">
		<button type="submit" name="search" value="search"></button>
	  	
		</form>
    </div>
</div>
