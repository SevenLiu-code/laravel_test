<?php
    namespace App\Http\Controllers;
    use App\Student;
    use Illuminate\Http\Request;
    /**
     *
     */
    class StudentController extends Controller
    {

      public function index() // 列表首页
      {
        $students = Student::paginate(3);
        return view('student.index', ['students' => $students]);
      }
      public function create(Request $request) // 新增学生列表页面
      {
        if ($request->isMethod('POST')) {
          $data = $request ->input('Student');
          if(Student::create($data)){
              return redirect('/student/index') ->with('success', '添加成功!');
          } else {
              return redirect() ->back();
          }
        }
        return view('student.create');
      }
      public function save(Request $request) // 表单指定方法提交
      {
          $data = $request->input('Student');
          $student = new Student();
          $student ->name = $data['name'];
          $student ->age = $data['age'];
          $student ->sex = $data['sex'];
          if($student ->save()) {
            return redirect('/student/index');
          } else {
            return redirect() ->back();
          }
      }
    }
