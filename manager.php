<?php
if( $cCLI->IsOptionSet("src") )
			{
			printf(_("%d source(s) specifed:\n"), $cCLI->GetOptionArgCount('src'));

			// since 'src' is 'multi' argument, GetOptionArg() returns an array
			// to trawerse. So we go so...
			$src = $cCLI->GetOptionArg("src");
			foreach( $src AS $key )
				printf("  Source: '%s'\n", $key );
			}

		if( $cCLI->IsOptionSet('dest') )
			printf("Destination: '%s'\n", $cCLI->GetOptionArg('dest') );
?>