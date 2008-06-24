<?php
/**
 *
*/
include ('app/click.php');
$proxys = file('config/proxys.txt');
$refers = file('config/refers.txt');
$users = file('config/users.txt');


foreach($proxys as $proxy){
	#$click = new clickThread(time() . microtime());
	#$click->run('http://www.andy21.com/ip/',$proxy);
	$refer = array_rand($refers, 1);
	$user = array_rand($users, 1);
	$click = new clickThread(time() . microtime(),$url,$proxy,$refer[0],$user[0]);
	#$click = new clickThread(time() . microtime(),'http://localhost/~compermisos/info.php',$proxy);
	$click->start();
	sleep(1);
}
?>
