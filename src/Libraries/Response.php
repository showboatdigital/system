<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| Response
|--------------------------------------------------------------------------
|
*/

class Response {


  /**
  * Redirect to supplied url
  *
  * @param string $url
  * @return void
  */

  public function redirect( $url )
  {
    header( 'Location: ' . $url );
    exit;
  }


  /**
  * Set cookie
  *
  * @param string $name
  * @param string $value
  * @return bool
  */

  public function cookie( $name, $value = null )
  {
    return setcookie(
      $name,
      $value,
      time() + ( Config::get( 'session.expire' ) * 60 ),
      Config::get( 'session.path' ),
      Config::get( 'session.domain' )
    );
  }


  /**
  * Set response header
  *
  * @param string $name
  * @param string $value
  * @return void
  */

  public function header( $name, $value  )
  {
    header( $name. ': ' . $value );
  }


  /**
  * Set the response code
  *
  * @param int $code
  * @return int
  */

  public function code( $code = 200 )
  {
    return http_response_code( $code );
  }


}
