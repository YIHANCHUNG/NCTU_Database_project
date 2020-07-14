<?php
  if(isset($_POST['ok2'])){
    for ($i = 2; $i <=6; $i++){
      if(substr($_POST[$i],0,4) == 'good'){
        $_SESSION['s'.substr($_POST[$i],4,2)]++;
        //echo '+: '.substr($_POST[$i],4,2).' ';
      }
      elseif (substr($_POST[$i],0,3) == 'bad'){
        $_SESSION['s'.substr($_POST[$i],3,2)]--;
        //echo '-: '.substr($_POST[$i],3,2).' ';
      }
    }
  }
?>