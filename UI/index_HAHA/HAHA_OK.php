<?php
  #include 'HAHA_array.php';
  #session_start();
  if(isset($_POST['ok'])){
    $sql = "select b.video_id, b.title, b.channel_title, d.thumbnail_link, d.category_id
    from basic as b, detail as d
    where b.video_id = d.video_id and (";
    if(!empty($_POST['category'])){
      foreach ($_POST['category'] as $select){
        $sql .= " d.category_id = ".$select." or ";
        $_SESSION['s'.$select] += 3;
      }
      $sql = substr($sql, 0, -3).") ";
    }else{
      $sql = substr($sql, 0, -5);
    }
    $sql .= "order by rand() limit 3;";
    $result = mysqli_query($connection, $sql);
    
    echo "<form method='post' action='index_HAHA2.php'>";
    if($result != ""){
      if(mysqli_num_rows($result) == 0){
        echo "<p style='font-size:30px'>:( No data found.</p>";
      }else{
        echo "<table style='width:80%'>
                <tr>
                  <th>Thumbnail</th>
                  <th>Title</th>
                  <th>Channel</th>
                  <th>  </th>
                  <th>&#x1F44D;</th>
                  <th>&#x1F44E;</th>
                  <th>&#x1F44C</th>
                </tr>";
        $count = 1;
        $count2 = -1;
        // 3 relative videos
        while($row = mysqli_fetch_assoc($result)){
          $count++;
          $count2--;
          echo "<tr>";
          echo "<th><img src='".$row['thumbnail_link']."' </th>";
          echo "<th>".$row['title']."</th>";
          echo "<th>".$row['channel_title']."</th>";
          echo "<th><a href='https://www.youtube.com/watch?v=".$row['video_id']."' target='_blank' style='color:blue;'>watch!</a></th>";
          //echo "<th><button id=".$count.$row['category_id']." style='border:2px solid white; outline:none' onclick='thumbup(".$count.$row['category_id'].")'>&#x1F44D;</button></th>";
          //echo "<th><button id=".$count2.$row['category_id']." style='border:2px solid white; outline:none' onclick='thumbdown(".$count2.$row['category_id'].")'>&#x1F44E;</button></th>";
          echo "<th><input name='".$count."' type='radio' value='good".$row['category_id']."' class='goodbad' id=".$count.$row['category_id']." onclick=thumbup(".$count.$row['category_id'].")></th>";
          echo "<th><input name='".$count."' type='radio' value='bad".$row['category_id']."' class='goodbad' id=".$count2.$row['category_id']." onclick=thumbdown(".$count2.$row['category_id'].")></th>";
          echo "<th><input name='".$count."' type='radio' value='soso' class='goodbad' checked></th>";
          //echo "<script>document.getElementById(".$count.$row['category_id'].").style.borderColor='lightgray';</script>";
          //echo "<script>document.getElementById(".$count2.$row['category_id'].").style.borderColor='lightgray';</script>";
        }
        // 2 irrelative videos
        $sql = "select b.video_id, b.title, b.channel_title, d.thumbnail_link, d.category_id
                from basic as b, detail as d
                where b.video_id = d.video_id
                order by rand()
                limit 2;";
        $result = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $count++;
          $count2--;
          $_SESSION['s'.$row['category_id']]++;
          echo "<tr>";
          echo "<th><img src='".$row['thumbnail_link']."' </th>";
          echo "<th>".$row['title']."</th>";
          echo "<th>".$row['channel_title']."</th>";
          echo "<th><a href='https://www.youtube.com/watch?v=".$row['video_id']."' target='_blank' style='color:blue;'>watch!</a></th>";
          //echo "<th><button id=".$count.$row['category_id']." style='border:2px solid white; outline:none' onclick='thumbup(".$count.$row['category_id'].")'>&#x1F44D;</button></th>";
          //echo "<th><button id=".$count2.$row['category_id']." style='border:2px solid white; outline:none' onclick='thumbdown(".$count2.$row['category_id'].")'>&#x1F44E;</button></th>";
          echo "<th><input name='".$count."' type='radio' value='good".$row['category_id']."' class='goodbad' id=".$count.$row['category_id']." onclick=thumbup(".$count.$row['category_id'].")></th>";
          echo "<th><input name='".$count."' type='radio' value='bad".$row['category_id']."' class='goodbad' id=".$count2.$row['category_id']." onclick=thumbdown(".$count2.$row['category_id'].")></th>";
          echo "<th><input name='".$count."' type='radio' value='soso' class='goodbad' checked></th>";
          //echo "<script>document.getElementById(".$count.$row['category_id'].").style.borderColor='lightgray';</script>";
          //echo "<script>document.getElementById(".$count2.$row['category_id'].").style.borderColor='lightgray';</script>";
          echo "</tr>";
        }
        echo "</table>";
      }
    }else{
      echo "GG <br>". $sql;
    }
    echo"<br>
    <input name='ok2' type='submit' value='Next' style='font-size: 30px;'>
    </from><br>";
    
    echo"<br><details><summary>How dose it works?</summary><p>Array below store the info of categories, 
        <br>meaning that we recommend the videos depend on the maximum numbers of the categories you pick, 
        <br>and notes that the last 2 recommendations are random, in case you have another interest.</p>";
    arsort($_SESSION);
    print_r($_SESSION);
    echo"</details>";
  }
?>
<script>
function thumbup(c){ 
  var yesno = document.getElementById(c);
  if(yesno.style.border == 'lightgray'){
    yesno.style.borderColor = "green";
    var other = document.getElementById(c*-1);
    if(other.style.borderColor == "red")
      other.style.borderColor = "lightgray";
  }
  else
    yesno.style.borderColor = "lightgray";
}
function thumbdown(c){ 
  var yesno = document.getElementById(c);
  if(yesno.style.borderColor == 'lightgray'){
    yesno.style.borderColor = "red";
    var other = document.getElementById(c*-1);
    if(other.style.borderColor == "green")
      other.style.borderColor = "lightgray";
  }
  else
    yesno.style.borderColor = "lightgray";
}
</script>
</body>
</html>