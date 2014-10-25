<?php

/*
|--------------------------------------------------------------------------
| Config
|--------------------------------------------------------------------------
|
*/

class Config  {


  /**
  * The name by which to resolve instance.
  *
  * @var string
  */

  protected static $name = 'config';


  /**
  * Get
  *
  * @return void
  */

  public function get( $path, $default = null )
  {

    if ( empty ( $path ) )
      return $default;

    $keys = explode( '.', $path );

    $file = APPLICATION . '/config/' . $keys[ 0 ] . '.php';

    if( ! file_exists( $file ) )
      return $default;

    $config = include_once( $file );

    unset( $keys[ 0 ] );

    foreach ( $keys as $key )
      if ( isset( $config[ $key ] ) )
        $config = $config[ $key ];
      else
        return $default;

    return $config;

  }


}
