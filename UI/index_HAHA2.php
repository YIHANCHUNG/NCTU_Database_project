<?php
  include 'header.php';
  include './index_HAHA/HAHA_array.php';
?>

<html>
  <body class="w3-main">
    <div class="w3-row w3-padding-64">
      <div class="w3-twothird w3-container">
        <h1 class="w3-text-teal">Choose the videos you like</h1>
          <?php include './index_HAHA/HAHA_OK.php'; ?>
          <?php
          foreach ($arr as $s){
            echo "$s <br>";
          } ?>
          <form method="post" action="index_HAHA2.php"><br>
            <input name="ok2" type="submit" value="Next" style="font-size: 30px;">
          </from>
          <br><br><h4><a href='index_HAHA.php' id="reset">reset</a><h4>
      </div>
    </div>
  </body>
</html>