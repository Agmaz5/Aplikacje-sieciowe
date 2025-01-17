<?php

namespace core;

use Exception;

require_once __DIR__ . '/Route.class.php';  // Include the Route class


class Router {

    public $action = null;
    public $routes = array();
    private $default = null;
    private $login = 'login';

    public function setAction($action) {
        $this->action = $action;
    }

    public function getAction() {
        return $this->action;
    }
    
    public function addRouteEx($action, $namespace, $controller, $method, $roles = null) {
        $this->routes[$action] = new Route($namespace, $controller, $method, $roles);
    }

    public function addRoute($action, $controller, $roles = null) {

        $this->routes[$action] = new Route(null, $controller, 'action_'.$action, $roles);
    }

    public function setDefaultRoute($route) {
        $this->default = $route;
    }

    public function setLoginRoute($route) {
        $this->login = $route;
    }




public function control($namespace, $controller, $method, $roles = null) {
    // Ensure the method name is 'execute' if it's not set explicitly.
    if ($method === 'action_productList') {
        $method = 'execute';
    }


    // Add namespace to the controller
    $controllerClass = "app\\controllers\\" . $controller;

    // Get the route's dynamic parameters
    $params = [];
    if (preg_match_all('/\{(\w+)\}/', $method, $matches)) {
        foreach ($matches[1] as $param) {
            // Assuming the parameters are passed in the URL (e.g., /productEdit/{id})
            if (isset($_GET[$param])) {
                $params[$param] = $_GET[$param];
            }
        }
    }

    // Load the controller file
    $basePath = realpath(__DIR__ . '/../app/controllers'); // Controller directory
    $controllerPath = $basePath . DIRECTORY_SEPARATOR . $controller . '.php';

    if (!file_exists($controllerPath)) {
        throw new Exception('Controller file "' . $controllerPath . '" does not exist');
    }

    require_once $controllerPath;

    // Check if the class exists
    if (!class_exists($controllerClass)) {
        throw new Exception('Controller class "' . $controllerClass . '" does not exist');
    }

    $ctrl = new $controllerClass;

    // If the method exists, call it
    if (method_exists($ctrl, $method)) {
        call_user_func_array([$ctrl, $method], $params);  // Call the method with dynamic parameters
    } else {
        throw new Exception('Method "' . $method . '" does not exist in controller "' . $controllerClass . '"');
    }
}






    public function go() {
        if (isset($this->routes[$this->action])) {
            $r = $this->routes[$this->action];
            $this->control($r->namespace, $r->controller, $r->method, $r->roles);
        } else {
            if (isset($this->default) && isset($this->routes[$this->default])) {
                $r = $this->routes[$this->default];
                $this->control($r->namespace, $r->controller, $r->method, $r->roles);
            } else {
                throw new Exception('Route for "' . $this->action . '" is not defined');
            }
        }
    }

}