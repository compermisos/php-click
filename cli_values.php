<?php
$args = array(
	"ver"	=> array("short"			=> "v",
		"long"			=> "version",
		"switch"			=> TRUE,
		"info"			=> "Displays version information",
	),
	"help"=>	array("short"			=> "h",
		"long"			=> "help",
		"info"			=> "Shows this page",
		"switch"			=> TRUE,
	),
	"foo"	=>	array('short'			=> "f",
											"info"			=> "This is damn long senseless description just to test ShowHelpPage() text wrapper. This is is damn long senseless description just to test ShowHelpPage() text wrapper. This is damn long senseless description just to test ShowHelpPage() text wrapper."
											),
);			


/* stop config values */

$cCLI = new CLI( $args );	
$log_main->info(_('Loaded to memory the cli lib.'));		
$result = $cCLI->Parse( $argc, $argv );
if( $cCLI->IsOptionSet("help") ){
	$cCLI->ShowHelpPage();
	$log_main->info(_('Help Page printed.'));
	exit( 0 );
}
if( $cCLI->IsOptionSet("ver") ){
	printf(_("Class version: %s\n"), $app['vercion']);
	$log_main->info(_('Vercion page printed.'));
	exit(o);
}
if( $argc == 1 ){
	printf(_("Type %s -help for details\n"), $argv[0]);
	$log_main->warn(_('No param send.'));
	$log_main->info(_('Printed help mensage.'));
}
if(!$result){
	$log_main->warn(_('error.'));	
	$log_main->debug($cCLI->ShowHelpPage());
	$log_main->debug($cCLI->ShowErrors());
	exit();
}
	
?>