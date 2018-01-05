<?php
	header('content-type:text/html;charset=utf-8;');
	 if(!function_exists('test1')) {
		 function test1(){
			 echo 'this is test1 </br>';
			 return array(12, 'fang', false);
			 return '33';
		 }
	 }
	 //var_dump(test1());
    // phpinfo();
function creatTable() {
  $table = '<table border="1" cellpadding="0" cellspacing="0" width="80%">';
	for ($i=0; $i < 3; $i++) {
		$table.='<tr>';
			for ($j=0; $j < 2; $j++) {
				$table.="<td>x</td>";
			};
		$table.='</tr>';
	};
	$table.='</table>';
	return $table;
}
// 变量
// 局部静态变量
function staticVar() {
	static $i = 1;
		echo $i.'</br>';
		++$i;
}
//staticVar();
//staticVar();
// 全局变量 使用global定义
function globalVar() {
	global $i,$j;
		++$i;
		++$j;
		return var_dump($i, $j);
}
// echo globalVar();
// echo $j;
// print_r($GLOBALS);
function test1(&$i) {
	$i+=10;
	var_dump($i);
}
$m = 10;
// test1($m);
// var_dump($m);
function test2($i){
	echo $i.'</br>';
	if($i>0) {
		$i-=1;
		$func = __FUNCTION__;
		$func($i);
	}
}
// test2(3);
$message = 'hello';
$example = function () use (&$message){
	// global $message;
	var_dump($message);
};
$message = 'hi666';
$example();
