<?php
namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function test1()
    {
        $student = DB::select('select * from student');
        dd($student);
      // DB::table('student') -> insert(['name' => 'liubin', 'age' => 18]);
      //$bool = DB::update('update student set age = ? where name = ?', [20, 'liubin']);
      //var_dump($bool);
    }
    public function query1()
    {
      //DB::table('student') -> insert(['name' => 'imooc', 'age' => 18]);
      // $bool = DB::update('update student set age = ? where name = ?', [18, 'liubin']);
      // dd($bool);
      //$num = DB::table('student') -> increment('age', 2);
      //$num = DB::table('student') -> increment('age', 2);
      // $num = DB::table('student')
      //   -> where('id', 1)
      //   -> decrement('age', 2, ['name' => 'liubin_best']);
      // var_dump($num);
      $num = DB::table('student')
        ->where('id',2)
        ->delete();
      var_dump($num);
    }
}

?>
