<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| Request
|--------------------------------------------------------------------------
|
*/

class Request {


  /**
  * Get the value for the specified header
  *
  * @param string $name
  * @return string|bool
  */

  public function input( $name )
  {
    return isset( $_REQUEST[ $name ] ) ? $_REQUEST[ $name ] : false;
  }


  /**
  * Get the value for the specified query string variable
  *
  * @param string $name
  * @return string|bool
  */

  public function get( $name )
  {
    return isset( $_GET[ $name ] ) ? $_GET[ $name ] : false;
  }


  /**
  * Get the value for the specified post
  *
  * @param string $name
  * @return string|bool
  */

  public function post( $name )
  {
    return isset( $_POST[ $name ] ) ? $_POST[ $name ] : false;
  }


  /**
  * Get the value for the specified server variable
  *
  * @param string $name
  * @return string|bool
  */

  public function server( $name )
  {
    return isset( $_SERVER[ $name ] ) ? $_SERVER[ $name ] : false;
  }


  /**
  * Get the value for the specified header
  *
  * @param string $name
  * @return string|bool
  */

  public function header( $name )
  {
    foreach( apache_request_headers() as $header => $value )
      if( $header == $name )
        return $value;

    return false;
  }


  /**
  * Get value of the specified cookie
  *
  * @param string $name
  * @return string|bool
  */

  public function cookie( $name )
  {
    return isset( $_COOKIE[ $name ] ) ? $_COOKIE[ $name ] : false;
  }


  /**
  * Get existing class instance
  *
  * @param string $method
  * @param array $args
  * @return void
  */

  public static function __callStatic( $method, $args )
  {
    call_user_func_array( array( new self, $method ), $args );
  }


}
