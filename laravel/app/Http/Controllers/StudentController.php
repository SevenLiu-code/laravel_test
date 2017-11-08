<?php
namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
use App\Student;
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
      // $num = DB::table('student')
      //   ->where('id',2)
      //   ->delete();
      // var_dump($num);
    }
    public function orm1()
    {
      // $student = Student::all();
      // dd($student);
      // $student = Student::insert([
      //   ['id'=>1001,'name'=>'zhangsan','age'=>19],
      //   ['id'=>1002,'name'=>'lisi','age'=>20],
      //   ['id'=>1003,'name'=>'wangwu','age'=>21],
      //   ['id'=>1004,'name'=>'lihua','age'=>30],
      //   ['id'=>1005,'name'=>'xiaoming','age'=>28]
      // ]);
      // $student= Student::where('id',1)->update(['age' => 18]); // 报错
      $num= Student::where('id','>',1001)->max('age');
      dd($num);
    }
    public function orm2()
    {
      // 使用模型新增数据
       //$student = new Student();
      // $student->name = 'beierniu';
      // $student->age = 6;
      // $bool = $student->save();
      // dd($bool);
      // $student = Student::create(
      //     ['name'=>'dandan', 'age'=>26]
      //   );
      // $bool = $student->save();
      // dd($bool);
      // $student = Student::firstOrCreate( //未找到，自动添加至数据库
      //     ['name'=>'imooc']
      //   );
      // dd($student);
      $student = Student::firstOrNew( // 未找到，返回一个新实例，不添加至数据库
          ['name'=>'imoocsss']
        );
      dd($student);
    }
    public function orm3() // orm更新，删除
    {
        // $student = Student::find(1008);
        // $student->name = 'kitty';
        // $bool = $student->save();
        // dd($bool);
        //$student = Student::where('id',1) ->update(['id'=>1000]);
         $student = Student::find(1010);
         $bool = $student ->delete();
        dd($bool);
    }
    public function section1()
    {
      return view('student.section1');
    }

}

?>
