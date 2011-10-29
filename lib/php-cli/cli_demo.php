#!/usr/bin/php4 -q
<?php

/***************************************************************************
**
** $Id: cli_demo.php,v 1.4 2003/05/25 21:15:48 carlos Exp $
**
** (C) Copyright 2003-2003 * All rights reserved
**     Marcin Orlowski <carlos@wfmh.org.pl>
**
** Function: (C)command (L)ine (I)nterface - shell argument parsing
**           and handling class. Features automatic required arguments
**           detection, valueless switches handling, automatic help
**           page display, unlimited argumens support and more
**
***************************************************************************/

	require_once "class_cli.php";


	$args = array(
						"src"	=>	array("short"			=> "s",
											"long"			=> "src",
											"info"			=> "Source directory",
											"required"		=> TRUE,
											"multi"			=> TRUE,
											"param"			=> ""
											),
						"dest"=>	array("long"			=> "dest",
											"info"			=> "Destination directory",
											),
						"test"=> array("short"			=> "t",
											"switch"			=> TRUE,
											),
						"foo"	=>	array('short'			=> "f",
											"info"			=> "This is damn long senseless description just to test ShowHelpPage() text wrapper. This is is damn long senseless description just to test ShowHelpPage() text wrapper. This is damn long senseless description just to test ShowHelpPage() text wrapper."
											),
						"ver"	=> array("short"			=> "v",
											"long"			=> "version",
											"switch"			=> TRUE,
											"info"			=> "Displays version information",
											),

						"help"=>	array("short"			=> "h",
											"long"			=> "help",
											"info"			=> "Shows this page",
											"switch"			=> TRUE,
											)
						);



	// let's setup the class
	$cCLI = new CLI( $args );

	// now, we parse the args
	$result = $cCLI->Parse( $argc, $argv );

   // ********* I M P O R T A N T ** R E A D ** T H I S ************
	// please note that we handle 'help' no matter of Parse() result!
	// This is correct behaviour, as it IS safe to check options even
	// Parse() gave and error result (FALSE). It's safe, because
	// FALSE means we probably had: a) missing required option,
	// b) missing an argument for option that is defined to need one
	// c) presence of unknown option. In no matter it means that
	// dead-end fatal error occured, so it's safe to check for
	// 'help' in this case. Frankly, you can check any option as
	// Parse finished its job no matter of accumulated errors. But
	// if Parse() returns FALSE you should not proceed! There's no
	// guarantee you will get all options correctly!
	//
	// RULE OF THUMB: if Parse() gave error (FALSE) it means you
	//                should exit your app with error message, but
	//                it's safe to check for some switches (i.e.
	//                'help') and react properly. But nothing more.


	// ... so no matter of Parse() result, we want to know if
	// user wants Help (if he specified 'help' only, s/he didn't gave
	// 'src' which is required, so that's the one of reasons Parse()
	// gave us FALSE.


	if( $cCLI->IsOptionSet("help") )
		{
		// let's give them a help page
		$cCLI->ShowHelpPage();

		// and quit. If user want's help s/he don't care errors
		// at this stage, that's why (again) we can act no matter
		// of Parse() result
		exit( 0 );
		}

	if( $cCLI->IsOptionSet("ver") )
		{
		printf("Class version: %s\n", $cCLI->version_str);
		exit(0);
		}


	// ok, can we proceed or not?
	if( $result )
		{
		// green light...
		if( $cCLI->IsOptionSet("src") )
			{
			printf("%d source(s) specifed:\n", $cCLI->GetOptionArgCount('src'));

			// since 'src' is 'multi' argument, GetOptionArg() returns an array
			// to trawerse. So we go so...
			$src = $cCLI->GetOptionArg("src");
			foreach( $src AS $key )
				printf("  Source: '%s'\n", $key );
			}

		if( $cCLI->IsOptionSet('dest') )
			printf("Destination: '%s'\n", $cCLI->GetOptionArg('dest') );
		}
	else
		{
		// oh, we failed. Spit out help page, and list of encountered
		// errors and quit
		$cCLI->ShowHelpPage();
		$cCLI->ShowErrors();
		exit();
		}


	if( $argc == 1 )
		{
		printf("Type %s -help for details\n", $argv[0]);
		}

?>
