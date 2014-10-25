<?php

  /*
  |-----------------------------------
  | asset
  |-----------------------------------
  |
  */

  function asset( $asset )
  {
    if( ! empty( $_SERVER[ 'HTTPS' ] ) )
      return str_replace( 'http://', 'https://', Config::get( 'wijbe.url' ) ) . '/' . $asset;
    else
      return Config::get( 'wijbe.url' ) . '/' . $asset;
  }


  /*
  |-----------------------------------
  | href
  |-----------------------------------
  |
  */

  function href( $href )
  {
    return Config::get( 'wijbe.url' ) . '/' . $href;
  }


  
