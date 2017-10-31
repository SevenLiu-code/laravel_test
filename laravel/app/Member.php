<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/28
 * Time: 10:18
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
class Member extends Model
{
    public static function getMember()
    {
        return 'member name is liubin';
    }
}