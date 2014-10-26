<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| Error
|--------------------------------------------------------------------------
|
*/

class Error {



  /**
  * Constructor
  *
  * @return void
  */

  public function __construct()
  {

    //set_exception_handler( call_user_func_array( [ $this, 'catcher' ], [ $e ] ) );


    //set_error_handler( $this, 'handler' );

  }


  public function handler( $errno, $errstr, $errfile, $errline )
  {
    echo 'LINE: ' . $errline . '<br>';
    echo 'STRING: ' . $errstring. '<br>';
    echo 'FILE: ' . $errfile. '<br>';
    echo 'NUMBER: ' . $errno. '<br>';
  }


  public function catcher( $exc )
  {
    var_dump( $exc );
  }


}
