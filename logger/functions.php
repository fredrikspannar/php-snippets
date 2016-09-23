<?php

/**
* Useful logger like the one in Codeigniter
* if you're not useing a framework
* copy and paste into a global file
* and include it.
*
* Define a path to where the log-files will be written, like;
* - define('GLOBAL_LOG_PATH', dirname(__FILE__).'/logs');
*
* Examples;
* - logger('$var1 = '.$var1');
* - logger('debug place 1 has $_POST = '.var_export($_POST,TRUE));
*
* Git; https://github.com/fredrikspannar/php-snippets
*/

function logger() {
	
	$path = GLOBAL_LOG_PATH;
	$filename = date("Y-m-d")."-log.php";
	
	// does the folder exist?
	if ( file_exists($path) == false) {
		@mkdir($path);
	}

	// get all parameters into this function
	$args = func_get_args();
	$str = implode( ', ', $args );
	
	// new file?
	$add_php = false;
	if ( file_exists($path.$filename) == false ) {
		$add_php = true;
	}
	
	// open and write
	$handle  = null;
	if ($handle = @fopen($path.$filename, 'a')) {
		$when = "[".date("Y-m-d H:i:s")."] ";
	
		// new file?
		if ( $add_php == true ) {
			@fwrite($handle, '<?php die();'."\n"."\n");
		}
	
		@fwrite($handle, '// '.$when.strip_tags($str)."\n");
		@fclose($handle);
	}
}

