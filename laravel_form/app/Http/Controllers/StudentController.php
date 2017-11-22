<?php
    namespace App\Http\Controllers;
    use Validator;
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
        $student = new Student();
        if ($request->isMethod('POST')) {
            // 表单验证
            // 1.控制器验证 -> 如果验证通过，代码会继续往下执行，否则会将错误信息存至session中
          // $this ->validate($request, [
          //   'Student.name' => 'bail|required|min:2|max:20',
          //   'Student.age' => 'required|integer',
          //   'Student.sex' => 'required|integer'
          // ], [
          //   'required' => ':attribute为必填字段',
          //   'min' => ':attribute长度不符合要求',
          //   'integer' => ':attribute必须为数字'
          // ],
          // [
          //   'Student.name' => '姓名',
          //   'Student.age' => '年龄',
          //   'Student.sex' => '性别'
          // ]);
          // 2.validator类验证
          $validator = validator::make($request ->all(), [
            'Student.name' => 'bail|required|min:2|max:20',
            'Student.age' => 'required|integer',
            'Student.sex' => 'required|integer'
          ], [
            'required' => ':attribute为必填字段',
            'min' => ':attribute长度不符合要求',
            'integer' => ':attribute必须为数字'
          ],
          [
            'Student.name' => '姓名',
            'Student.age' => '年龄',
            'Student.sex' => '性别'
          ]);
          if ($validator ->fails()) {
              return redirect('student/create')
                        ->withErrors($validator)
                        ->withInput(); // 数据保持
          }
          $data = $request ->input('Student');
          if(Student::create($data)){
              return redirect('/student/index') ->with('success', '添加成功!');
          } else {
              return redirect() ->back();
          }
        }
        return view('student.create', ['student' => $student]);
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
      public function update(Request $request, $id) // request写在第一个参数不会影响路由
      {
          $student = Student::find($id);
          if ($request ->isMethod('POST')) {

            $this ->validate($request, [
              'Student.name' => 'bail|required|min:2|max:20',
              'Student.age' => 'required|integer',
              'Student.sex' => 'required|integer'
            ], [
              'required' => ':attribute为必填字段',
              'min' => ':attribute长度不符合要求',
              'integer' => ':attribute必须为数字'
            ],
            [
              'Student.name' => '姓名',
              'Student.age' => '年龄',
              'Student.sex' => '性别'
            ]);

            $data = $request ->input('Student');
            $student ->name = $data['name'];
            $student ->age = $data['age'];
            $student ->sex = $data['sex'];
            if($student ->save()) {
              return redirect('/student/index') ->with('success', '修改成功-'.$id);
            } else {
              return redirect() ->back();
            }
          }
          return view('student.update', [
            'student' => $student
          ]);
      }
      public function detail($id) // 学生列表详情
      {
        $student = Student::find($id);
        return view('student.detail', [
          'student' => $student
        ]);
      }
      public function delete($id)
      {
        $student = Student::find($id);
        if ($student ->delete()) {
          return redirect('/student/index') ->with('success', '删除'.$id.'成功');
        } else {
          return redirect('/student/index') ->with('success', '删除'.$id.'失败');
        }
      }
    }
