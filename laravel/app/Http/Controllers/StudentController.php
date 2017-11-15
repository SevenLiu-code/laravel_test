<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
      $name = 'liubin';
      $arr = ['liubin','imooc'];
      return view('student.section1', ['name' => $name,'arr' => $arr]);
    }
    public function urlTest()
    {
      echo "urlTest";
    }
    public function request1(Request $request)
    {
      // 1.取值
      echo $request ->name;
      //echo dd($request ->all());
      // 2.判断请求类型
      echo $request ->method();
    }
    public function session1(Request $request)
    {
      //  1.
        // $request ->session() ->put('key1', 'vaule1');
      // 2.
      // session() ->put('key2', 'value2');
      // 3.
      //Session::put('key3', 'vaule3');
      // 把数据存入session数组中
      //  Session::push('student', 'liubin');
      //  Session::push('student', 'mooc');
      //删除数据
      //$res = Session::forget('key1');
      // 删除全部
      // $res = Session::flush('key1');
      //取出数据并删除
      //$res = Session::pull('student', 'default');
      // 只有第一次访问时存在
      $res = Session::flash('key-flash', 'vaule-flash');
      //var_dump($res);
    }
    public function session2(Request $request)
    {
      //echo $request ->session() ->get('key1');
      //echo session() ->get('key2');
      // echo Session::get('key4', 'default'); // 不纯在则取默认值'default'
      // $res = Session::get('student', 'default');
      // var_dump($res);
      // 访问所有数据 all()
      // $res = Session::all();
      $res = Session::get('key-flash');
      var_dump($res);
    }
    public function response1()
    {
      // 相应json
      // $data = [
      //   'errCode' => 0,
      //   'errMsg' => 'success',
      //   'data' => 'liubin'
      // ];
      // return response() ->json($data);
      // 重定向
      return redirect('session2');
    }
    // 中间件
    public function activity0()
    {
      echo '活动筹备中，敬请期待';
    }
    public function activity1()
    {
      echo '活动进行中！';
    }
    public function activity2()
    {
      echo '互动进行中！';
    }
}

?>
