<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/27
 * Time: 13:13
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Member;
class MemberController extends Controller // 类名和文件名必须一样
{
    public function info($id)
    {
        // return 'member-info-' . $id;
        return Member::getMember(); // 模型调用
        //return view('member/info', ['name' => '刘彬', 'age' => 18]);
    }
}