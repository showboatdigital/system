<?php

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

  function public __construct()
  {

    set_exception_handler( $this, 'catcher' );


    set_error_handler( $this, 'handler' );

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
