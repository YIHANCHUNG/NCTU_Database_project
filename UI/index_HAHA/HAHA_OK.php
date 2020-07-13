<?php
  include 'HAHA_array.php';

  if(isset($_POST['ok']) or isset($_POST['ok2'])){
    $sql = "select b.video_id, b.title, b.channel_title, d.thumbnail_link
    from basic as b, detail as d
    where b.video_id = d.video_id and (";
    if(!empty($_POST['category'])){
      foreach ($_POST['category'] as $select){
        #echo "<span><b>".$select."</b></span><br/>";
        $sql .= " d.category_id = ".$select." or ";
        $arr[$select]++;
      }
      $sql = substr($sql, 0, -3).") ";
    }else{
      $sql = substr($sql, 0, -5);
    }
    $sql .= "order by rand() limit 3;";
    $result = mysqli_query($connection, $sql);
    
    if($result != ""){
      echo "<table style='width:80%'>
              <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Channel</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>";
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<th><img src='".$row['thumbnail_link']."' </th>";
        echo "<th>".$row['title']."</th>";
        echo "<th>".$row['channel_title']."</th>";
        echo "<th><a href='https://www.youtube.com/watch?v=".$row['video_id']."' target='_blank' style='color:blue;'>watch!</a></th>";
        echo "<th><button>&#x1F44D;</button></th>";
        echo "<th><button>&#x1F44E;</button></th>";
        echo "</tr>";
      }
      echo "</table>";
      
    }else{
      echo "GG <br>". $sql;
    }
  }
?>
</body>
</html>