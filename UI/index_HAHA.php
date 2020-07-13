<?php
  include 'header.php';
  session_start();
  include './index_HAHA/HAHA_array.php';
?>

<html>
  <body class="w3-main">
    <div class="w3-row w3-padding-64">
      <div class="w3-twothird w3-container">
        <h1 class="w3-text-teal">Select the categories you like</h1>
          <form method="post" action="index_HAHA2.php">
            <label class="heading">To Select Multiple Options Press ctrl+left click :</label><br>
            <select multiple name="category[]" size="5">
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
            </select>
            <!--<input name="submit" type="submit" value="Get Selected Values">-->
            <br><br><input name="ok" type="submit" value="OK" style="font-size: 30px;">
            <?php #include'./index_HAHA/HAHA_select_value.php'; ?>
            <?php #include'./index_HAHA/HAHA_OK.php'; ?>
          </form>
          
          <br><h4><a href='./index_HAHA/HAHA_destroy.php' id="reset">reset</a><h4>
      </div>
    </div>
  </body>
</html>