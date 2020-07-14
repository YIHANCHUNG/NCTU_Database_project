<?php
	include 'header.php'
?>


<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
		<form action="insert.php" method="POST">
		video link:
		<input type="text" name="video_id" placeholder="Insert URL"><br>
		trending date:
		<input type="text" name="trending_date" placeholder="ex:17.14.11"><br>
		title:
		<input type="text" name="title" placeholder="Insert title"><br>
		channel title:
		<input type="text" name="channel_title" placeholder="Insert channel title"><br>
		category:<select name="category">
		<option value="1" selected> "Film & Animation" </option> 
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
		</select><br>
		publish time:
        <input type="text" name="publish_time" placeholder="ex:2017-11-13T17:13:01.000Z"><br>
		tags:
		<textarea cols="50" rows="5" name="tags">
		</textarea><br>
		views:
		<input type="text" name="views" placeholder="Insert views">
		likes:
		<input type="text" name="likes" placeholder="Insert likes">
		dislikes:
		<input type="text" name="dislikes" placeholder="Insert dislikes">
		comment count:
		<input type="text" name="comment_count" placeholder="Insert comment count"><br>
		thumbnail link:
		<input type="text" name="thumbnail_link" placeholder="Insert URL"><br>
		comments disabled:
		<input type ="radio" name="comments_disabled" value="0" checked>False
        <input type ="radio" name="comments_disabled" value="1">True
        ratings disabled:
		<input type ="radio" name="ratings_disabled" value="0" checked>False
        <input type ="radio" name="ratings_disabled" value="1">True
        video error or removed:
		<input type ="radio" name="video_error_or_removed" value="0" checked>False
        <input type ="radio" name="video_error_or_removed" value="1">True<br>
		description:
		<textarea cols="50" rows="5" name="description">
		</textarea><br>
		<button type="submit" name="insert" value="insert"></button>
 	
		</form>
    </div>
</div>
