<?php
/**
 * @package tests
 * @subpackage loggers
 * @author VxR <vxr@vxr.it>
 * @version $Revision: 1.1 $
 * @since 0.6
 */

/**
 */
require_once('./MyLogger.php');

$mylogger =& MyLogger::getInstance("myTest");

$mylogger->debug('this is a DEBUG log generated by main() function');
$mylogger->info('this is an INFO log generated by main() function');
$mylogger->warn('this is a WARN log generated by main() function');
$mylogger->error('this is an ERROR log generated by main() function');
$mylogger->fatal('this is a FATAL log generated by main() function');

?>