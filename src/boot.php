<?php

  /*
  |--------------------------------------------------------------------------
  | Paths
  |--------------------------------------------------------------------------
  |
  | Define realpath constants. Let's just do it once and never need to figure
  | it out again.
  |
  */

    define( 'APPLICATION', realpath( __DIR__ . '/../application' ) );

    define( 'PUBLIC', realpath( __DIR__ . '/../public' ) );

    define( 'STORAGE', realpath( __DIR__ . '/../storage' ) );

    define( 'SYSTEM', realpath( __DIR__ ) );


  /*
  |--------------------------------------------------------------------------
  | Autoload
  |--------------------------------------------------------------------------
  |
  | Autoload all of our system libraries and helpers, as well as any
  | controllers defined in the application.
  |
  */

    include( SYSTEM . '/Facades/Facade.php' );

    $autoload = array(
      SYSTEM . '/Facades',
      SYSTEM . '/Libraries',
      APPLICATION . '/controllers',
      APPLICATION . '/models',
    );

    foreach( $autoload as $path )
      foreach ( glob( $path . '/*.php' ) as $file )
        include $file;



  /*
  |--------------------------------------------------------------------------
  | Facades
  |--------------------------------------------------------------------------
  |
  | Import our facades such that the facade class is called whenever the class
  | is referenced without the complete namespace.
  |
  */

    $aliases = array(
      'Init' => 'Wijbe\System\Libraries\Init',
      'Error' => 'Wijbe\System\Facades\Error',
      'Response' => 'Wijbe\System\Facades\Response',
      'Route' => 'Wijbe\System\Facades\Route',
      'View' => 'Wijbe\System\Facades\View',
    );


    foreach( $aliases as $alias => $facade )
      class_alias( $facade, $alias );

  /*
  |--------------------------------------------------------------------------
  | Init
  |--------------------------------------------------------------------------
  |
  | Create and store library class instances in Init, allowing them to be
  | retrieved by the alias specified below.
  |
  */

    $aliases = array(
      //'cache'     => 'Wijbe\System\Libraries\Cache',
      //'config'    => 'Wijbe\System\Libraries\Config',
      'error'       => 'Wijbe\System\Libraries\Error',
      //'request'   => 'Wijbe\System\Libraries\Request',
      'response'    => 'Wijbe\System\Libraries\Response',
      'route'       => 'Wijbe\System\Libraries\Route',
      'view'        => 'Wijbe\System\Libraries\View',
    );

    foreach( $aliases as $alias => $class )
      Init::bind( $alias, $class );



  /*
  |--------------------------------------------------------------------------
  | Environment
  |--------------------------------------------------------------------------
  |
  | Define our environment
  |
  */

    // if( ! empty( Config::get( 'application.environments.' . gethostname() ) )
    //   define( 'ENVIRONMENT', Config::get( 'application.environments.' . gethostname() );
    // else
    //   define( 'ENVIRONMENT', 'production' );

  /*
  |--------------------------------------------------------------------------
  | Route
  |--------------------------------------------------------------------------
  |
  | Call our route loader, which will parse the URL segments, ignoring any
  | subdirectories, to call controller/method/arg1/arg2/etc.
  |
  */

    Route::load();
