<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| Route
|--------------------------------------------------------------------------
|
*/

class Route {


  /**
  * The name by which to resolve instance.
  *
  * @var array
  */

  private $path = array();


  /**
  * Constructor
  *
  * @return void
  */

  public function __construct()
  {
    $this->path = $this->path();
  }


  /**
  * Segments from request
  *
  * @return array
  */

  private function path()
  {
    $request = explode( '/', $_SERVER[ 'REQUEST_URI' ] );

    $script = explode( '/', $_SERVER[ 'SCRIPT_NAME' ] );

    // ignore subdirectories
    for( $i = 0; $i < sizeof( $script ); $i++ )
      if ( $request[ $i ] == $script[ $i ] )
        unset( $request[ $i ] );

    // array: contoller, method, arg1, arg2, etc
    $path = array_values( $request );

    // if( empty( $path ) )
    //   $path = explode( '/', Config::get( 'app.index' ) );

    return $path;
  }



  /**
  * Controller instance
  *
  * @return object|bool
  */

  private function controller()
  {
    $class = ucfirst( $this->path[ 0 ] ) . 'Controller';

    return class_exists( $class ) ? new $class() : false;
  }


  /**
  * Controller method
  *
  * @param instance $controller
  * @return string|bool
  */

  private function method( $controller )
  {
    $method = strtolower( $_SERVER['REQUEST_METHOD'] );

    if( empty( $this->path[ 1 ] ) )
      $method.= 'index';
    else
    {
      foreach( explode( '-', $this->path[ 1 ] ) as $segment )
        $method.= ucfirst( $segment );
    }

    return method_exists( $controller, $method ) ? $method : false;
  }


  /**
  * Load route
  *
  * @return void
  */

  public function load()
  {

    if( ! $controller = $this->controller() )
      return View::error( 404 );

    if( ! $method = $this->method( $controller ) )
      return View::error( 404 );

    // define args
    $args = array_slice( $this->path, 2 );

    // fire controller method with args
    return call_user_func_array( [ $controller, $method ], $args );

  }



}
