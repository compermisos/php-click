<?php
/**
 *
*/
for ($i = 1; $i <= 10; $i++) {
	$pid = pcntl_fork();
	if ($pid == -1) {
		die('could not fork');
	} else if ($pid) {
		// we are the parent
		pcntl_wait($status); //Protect against Zombie children
		echo ($i);
		sleep(30);
		exit();
	} else {
		// we are the child
	}
}
?>
