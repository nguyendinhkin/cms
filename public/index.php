<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

/**
 * Composer
 */
require '../vendor/autoload.php';


/**
 * Twig
 */
Twig_Autoloader::register();
session_start();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('search', ['controller' => 'Search', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'index']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);
$router->add('profile', ['controller' => 'Profile', 'action' => 'index']);
$router->add('admin', ['controller' => 'Home', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/posts', ['controller' => 'Posts', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/add-post', ['controller' => 'Posts', 'action' => 'addPost', 'namespace' => 'Admin']);
$router->add('admin/category', ['controller' => 'Categories', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/comment', ['controller' => 'Comments', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('admin/user', ['controller' => 'Users', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{action}/{id:\d+}', ['namespace' => 'Admin']);
    
$router->dispatch($_SERVER['QUERY_STRING']);
