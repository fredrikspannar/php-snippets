# Some (perhaps) useful PHP-snippets

## Logger
logger/functions.php

Use it to log variables when debugging. Useful if you don't use any framework.

### Setup
- Copy/paste the function logger into a global functions-file
- Add a log path with define ( see example in file )

### Examples
- logger('$var1 = '.$var1');
- logger('debug place 1 has $_POST = '.var_export($_POST,TRUE));