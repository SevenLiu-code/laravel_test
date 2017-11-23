<?php
//测试过期时间
  setCookie('1','aaa', time()+10);
  setCookie('2','bbb', time()+30);
  setCookie('3','ccc', time()+60);
  echo '2';
?>
