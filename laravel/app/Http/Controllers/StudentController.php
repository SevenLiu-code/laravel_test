<?php
namespace App\Http\Controllers;
Use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function test1()
    {
       $student = DB::select('select * from student');
       var_dump($student);
      // DB::table('student') -> insert(['name' => 'liubin', 'age' => 18]);
    }
}

?>
