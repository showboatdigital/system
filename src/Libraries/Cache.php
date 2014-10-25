<?php

/*
|--------------------------------------------------------------------------
| Cache
|--------------------------------------------------------------------------
|
*/

class Cache {



  /**
  * Get
  *
  * @return void
  */

  public static function get( $ttl = 60, $vars = array() )
  {
    $instance = new static;

    if( file_exists( $instance->file( $vars ) ) && ( time() - ( $ttl*60 ) < filemtime( $instance->file( $vars ) ) ) )
    {
      include( $instance->file( $vars ) );
      exit;
    }
    else
      ob_start();
  }



  /**
  * Set
  *
  * @return void
  */

  public static function set( $vars = array() )
  {
    $instance = new static;

    $fp = fopen( $instance->file( $vars ), 'w+' );
    fwrite( $fp, ob_get_contents() );
    fclose( $fp );
    ob_end_flush();
  }


  /**
  * Clear
  *
  * @return void
  */

  public static function clear( $vars = array() )
  {
    $instance = new static;
    unlink( $instance->file( $vars ) );
  }


  /**
  * File
  *
  * @return void
  */

  private function file( $vars )
  {
    return __DIR__ . '/../cache/' . md5( $_SERVER[ 'REQUEST_URI' ] . ',' . implode( ',', $vars ) ) . '.cache';
  }


}
