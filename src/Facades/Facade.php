<?php namespace Wijbe\System\Facades;

/*
|--------------------------------------------------------------------------
| Facade
|--------------------------------------------------------------------------
|
*/

abstract class Facade {


  /**
  * The name by which to resolve instance.
  *
  * @var string
  */

  protected static $accessor;


  /**
  * Get existing class instance
  *
  * @param string $method
  * @param array $args
  * @return void
  */

  public static function __callStatic( $method, $args )
  {
    if( empty( static::$alias ) )
      throw new Exception( 'Class does not implement abstract Facade correctly.' );

    $instance = \Init::call( static::$alias );

    return call_user_func_array( [ $instance, $method ], $args );
  }

}
