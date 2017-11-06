<?php
  header('content-type:text/html;charset=utf-8;');
  /**
   *
   */
  class NbaPlayer
  {
    public $name = 'james';
    public $height = '198cm';
    function __construct($name, $height)
    {
      $this ->name = $name;
      $this ->height = $height;
    }
    function __destruct()
    {
      echo 'destruct';
    }
  }
  $kb = new Nbaplayer('kb', '199cm');
  //echo $kb ->name."\n";
  $kb = null;
 ?>
