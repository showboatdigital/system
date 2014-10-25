<?php

/*
|--------------------------------------------------------------------------
| Form
|--------------------------------------------------------------------------
|
*/

class Form {


  /**
  *
  *
  * @return void
  */

  public static function open( $action = null, $method = null, $attributes = array() )
  {
    echo '<form';

    if( ! empty( $action ) )
      echo ' action="' . $action . '"';

    if( ! empty( $method ) )
      echo ' method="' . $method . '"';

    if( ! empty( $attributes ) && is_array( $attributes ) )
      foreach( $attributes as $name => $value )
        echo ' ' . $name . '="' . $value . '"';

    echo '>' . "\n";
  }


  public static function label( $label, $for )
  {
    echo '<label for="' . $for . '">' . $label . '</label>' . "\n";
  }

  public static function close()
  {
    echo '</form>' . "\n";
  }



}
