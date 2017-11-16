<?php
  namespace App;
  use Illuminate\Database\Eloquent\Model;
  class Student extends Model
  {
    protected $table = 'student';
    public $timetamps = true; // 自动维护时间戳
    protected function getDateFormat()
    {
      return time();
    }
    protected function asDateTime($val)
    {
      return $val; // 返回Unix时间戳
    }
  }
?>
