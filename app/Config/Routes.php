<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

//GROUP CRUD----------------------------------------------------------------

//GROUP API----------------------------------------------------------------
$routes->group("api", function ($routes){
    $routes->post("register", "Register::index");
    $routes->post("login", "Login::index");
    $routes->get("users", "User::viewList"); 
    $routes->get("request", "Request::viewList");
    //$routes->get("users", "User::viewList",['filter' => 'authFilter']);
    $routes->get("elements", "Element::viewList",['filter' => 'authFilter']);
});

//GROUP API REST USER----------------------------------------------------------------
$routes->group("user", function($routes){
    $routes->get("/", "user::index",['filter' => 'authFilter']);
    $routes->get("show", "user::index",['filter' => 'authFilter']);
    $routes->get("edit/(:num)","user::singleUser/$1",['filter' => 'authFilter']);
    $routes->get("delete/(:num)","user::delete/$1",['filter' => 'authFilter']);
    $routes->post("add","user::create",['filter' => 'authFilter']);
    $routes->post("update/(:num)","user::update/$1",['filter' => 'authFilter']);
});

//GROUP API REST ELEMENT----------------------------------------------------------------
$routes->group("element", function($routes){
    $routes->get("/", "element::index",['filter' => 'authFilter']);
    $routes->get("show", "element::index",['filter' => 'authFilter']);
    $routes->get("edit/(:num)","element::singleElement/$1",['filter' => 'authFilter']);
    $routes->get("delete/(:num)","element::delete/$1",['filter' => 'authFilter']);
    $routes->post("add","element::create",['filter' => 'authFilter']);
    $routes->post("update/(:num)","element::update/$1",['filter' => 'authFilter']);
});













$routes->group("userStatus", function($routes){
    $routes->get("/", "userStatus::index");
    $routes->get("show", "UserStatus::index");
    $routes->get("edit/(:num)","UserStatus::singleUserStatus/$1");
    $routes->get("delete/(:num)","UserStatus::delete/$1");
    $routes->post("add","UserStatus::create");
    $routes->post("update","UserStatus::update");
});

$routes->group("role", function($routes){
    $routes->get("/", "role::index");
    $routes->get("show", "role::index");
    $routes->get("edit/(:num)","role::singleRoles/$1");
    $routes->get("delete/(:num)","role::delete/$1");
    $routes->post("add","role::create");
    $routes->post("update","role::update");
});


$routes->group("permission", function($routes){
    $routes->get("/", "Permission::index");
    $routes->get("show", "Permission::index");
    $routes->get("edit/(:num)","Permission::singlePermission/$1");
    $routes->get("delete/(:num)","Permission::delete/$1");
    $routes->post("add","Permission::create");
    $routes->post("update","Permission::update");
});

$routes->group("elementStatus", function($routes){
    $routes->get("/", "elementStatus::index");
    $routes->get("show", "elementStatus::index");
    $routes->get("edit/(:num)","elementStatus::singleElementStatus/$1");
    $routes->get("delete/(:num)","elementStatus::delete/$1");
    $routes->post("add","elementStatus::create");
    $routes->post("update","elementStatus::update");
});

$routes->group("category", function($routes){
    $routes->get("/", "category::index");
    $routes->get("show", "category::index");
    $routes->get("edit/(:num)","category::singleCategory/$1");
    $routes->get("delete/(:num)","category::delete/$1");
    $routes->post("add","category::create");
    $routes->post("update","category::update");
});

$routes->group("requestStatus", function($routes){
    $routes->get("/", "requestStatus::index");
    $routes->get("show", "requestStatus::index");
    $routes->get("edit/(:num)","requestStatus::RequestStatus/$1");
    $routes->get("delete/(:num)","requestStatus::delete/$1");
    $routes->post("add","requestStatus::create");
    $routes->post("update","requestStatus::update");
});