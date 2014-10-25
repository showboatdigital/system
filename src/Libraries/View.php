<?php namespace Wijbe\System\Libraries;

/*
|--------------------------------------------------------------------------
| View
|--------------------------------------------------------------------------
|
| View::template( 'template.default' )->load( 'page.welcome', $data );
|
*/

class View {


  /**
  * Path to template file
  *
  * @var string
  */

  protected $template;


  /**
  * Load view
  *
  * @param string $view
  * @param array|object $data
  * @return void
  */

  public function load( $view, $data = array() )
  {
    $view = APPLICATION . '/views/' . str_replace( '.', '/', $view ) . '.php';

    if( ! file_exists( $view ) )
      throw new Exception( 'View file ' . $view . ' not found.' );

    extract( $data );

    if( ! empty( $this->template ) )
      include $this->template;
    else
      include $view;
  }


  /**
  * Set template
  *
  * @param string $template
  * @return instance
  */

  public function template( $template )
  {
    $template = APPLICATION . '/views/' . str_replace( '.', '/', $template ) . '.php';

    if( ! file_exists( $template ) )
      throw new Exception( 'Template file ' . $template . ' not found.' );

    $this->template = $template;

    return $this;
  }


  /**
  * Json view
  *
  * @param array|object $data
  * @param int $code
  * @return void
  */

  public function json( $data, $code = 200 )
  {
    Response::code( $code );
    Response::header( 'Content-Type', 'application/json' );

    echo json_encode( $data );
  }

}
