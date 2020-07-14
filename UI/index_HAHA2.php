<?php
  include 'header.php';
  #include './index_HAHA/HAHA_array.php';
  session_start();
?>

<html>
  <body class="w3-main">
    <div class="w3-row w3-padding-64">
      <div class="w3-twothird w3-container">
        <h1 class="w3-text-teal">Choose the videos</h1>
          <p>
            Videos below are our recommendation.&nbsp;
            You can click <b>thumbup</b> if you like it, <b>thumbdown</b> if you don't.&nbsp;
            Then click <b>Next</b> to view others.<br>
          </p>
          <?php include_once './index_HAHA/HAHA_OK.php'; ?>
          <?php include './index_HAHA/HAHA_OK2.php'; ?>
          <!--<form method="post" action="index_HAHA2.php"><br>
            <input name="ok2" type="submit" value="Next" style="font-size: 30px;">
          </from>-->
          <br><h4><a href='./index_HAHA/HAHA_destroy.php' id="reset">reset</a><h4>
      </div>
    </div>
  </body>
</html>