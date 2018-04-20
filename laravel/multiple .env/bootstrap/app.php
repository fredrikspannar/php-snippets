<?php

/*
   Instructions:

   Copy the snippet below into bootstrap/app.php just above the return $app
 */

/*
|--------------------------------------------------------------------------
| Load Environment File on Startup
|--------------------------------------------------------------------------
|
| This will determine, which environment will be loaded for our application.
|
*/

$env = $app->detectEnvironment(function(){
    $environmentPath = __DIR__.'/../';
    $localEnv = '';

    if ( isset($_SERVER['HTTP_HOST']) ) {
        
        //
    	// for local development with suffix .local
    	// 
        if ( strpos($_SERVER['HTTP_HOST'], '.local') && file_exists($environmentPath.'.env.local') ) {
        	// .local-domain and a .env.local exists
        	$localEnv = '.env.local';

        //
        // just add more of the next if for more domains/sites and replace anotherdomain.com with your domain
        // 
        } else if ( strpos($_SERVER['HTTP_HOST'], 'anotherdomain.com') && file_exists($environmentPath.'.env.anotherdomain.com') ) {
        	// another domain
        	$localEnv = '.env.anotherdomain.com';
        }

        // load the .env
        if ( !empty($localEnv) ) {
    	    $setEnv = trim(file_get_contents($environmentPath.$localEnv));	    
            putenv("$setEnv");

        	$dotenv = new Dotenv\Dotenv($environmentPath, $localEnv);
        	$dotenv->load();
        }
    }
});