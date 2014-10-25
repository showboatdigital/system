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

  public static function call( $alias )
  {
    $instance = static::$instances[ $alias ];

    if ( $instance instanceof Closure )
      $instance = $instance();

    return $instance;
  }


  /**
  * Set new class instance
  *
  * @return void
  */

  public static function bind( $alias, $instance )
  {
    if ( is_string( $instance ) )
      $instance = new $instance();

    static::$instances[ $alias ] = $instance;
  }


}
