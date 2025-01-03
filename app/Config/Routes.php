<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ==================== Login ===================================
$routes->match(['get','post'],'admin/login', 'AdminController::adminLogin');
$routes->get('admin/logout', 'AdminController::userLogout');

// Admin Dashboard
$routes->group('admin',['filter'=>'adminLogin'], static function($routes){  
    $routes->get('/', 'AdminController::adminDashboard');
    $routes->match(['get','post'],'create_page', 'AdminController::create_page');

});
