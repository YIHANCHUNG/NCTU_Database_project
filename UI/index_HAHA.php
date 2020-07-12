<?php
  include 'header.php'
?>

<html>
  <body class="w3-main">
    <div class="w3-row w3-padding-64">
      <div class="w3-twothird w3-container">
        <h1 class="w3-text-teal">Select the categories you like</h1>
          <form method="post">
            <label class="heading">To Select Multiple Options Press ctrl+left click :</label><br>
            <select multiple name="Color[]" size="5">
              <option value="Red">Red</option>
              <option value="Green">Green</option>
              <option value="Blue">Blue</option>
              <option value="Pink">Pink</option>
              <option value="Yellow">Yellow</option>
              <option value="White">White</option>
              <option value="Black">Black</option>
              <option value="Violet">Violet</option>
              <option value="Limegreen">Limegreen</option>
              <option value="Brown">Brown</option>
              <option value="Orange">Orange</option>
            </select>
            <?php include'HAHA_select_value.php'; ?>
            <input name="submit" type="submit" value="Get Selected Values">
          <form>
          <br><br><button class="button" onclick="">reset</button>

      </div>
    </div>
  </body>
</html>