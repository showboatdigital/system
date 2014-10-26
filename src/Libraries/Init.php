<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| Init
|--------------------------------------------------------------------------
|
*/

class Init {


  /**
  * Hold instances
  *
  * @var array
  */

  private static $instances = array();


  /**
  * Get existing class instance
  *
  * @param string $class
  * @return void
  */

  public static function call( $accessor )
  {
    $instance = static::$instances[ $accessor ];

    if ( $instance instanceof Closure )
      $instance = $instance();

    return $instance;
  }


  /**
  * Set new class instance
  *
  * @return void
  */

  public static function bind( $accessor, $instance )
  {
    if ( is_string( $instance ) )
      $instance = new $instance();

    static::$instances[ $accessor ] = $instance;
  }


}
