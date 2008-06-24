#!/usr/bin/php
<?php
require_once('config/base.php');
require_once(GETTEXT_DIR . '/gettext.inc');
require_once(LOG4PHP_DIR . '/LoggerManager.php');
require_once(PHPCLI_DIR . 'class_cli.php');
$log_main =& LoggerManager::getLogger('Main');
$log_main->info('All base componet ara loaded.');
require_once('config/default.php');
echo _('Welcome to PHP APPNAME.'),"\n",_('Your request: HTTP://'),$hola, '',"\n";

LoggerManager::shutdown();
?>