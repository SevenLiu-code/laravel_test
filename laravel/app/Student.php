<?php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Student extends Model
    {
      // 指定表名
      protected $table = 'student';
      // 指定主键为id
      protected $primarykey = 'id';
      // 自动维护时间戳 默认为true
      public $timestamps = true;
      // 允许批量赋值
      public $fillable = ['name', 'age'];
    }
 ?>
