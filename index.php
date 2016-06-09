<?php

require 'vendor/autoload.php';
include( 'routes.php' );
session_start();

$default_route = $routes['default'];
$route_parts = explode('/', $default_route);

$method = $_SERVER['REQUEST_METHOD'];
$a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'home';

$e = isset( $_REQUEST[ 'e' ] ) ? $_REQUEST[ 'e' ] : 'page';



if ( !in_array( $a . '_' . $e, $routes ) ) { 
    die( 'cette route n\'est pas permise' );
}


$controller_name = '\Controller\\' . ucfirst( $e ) . 'Controller';

$container = new \Illuminate\Container\Container();
$controller = $container->make($controller_name);

$datas = call_user_func( [ $controller, $a ] );


include( 'views/view.php' );
