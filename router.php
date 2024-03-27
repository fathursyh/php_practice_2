<?php
declare(strict_types=1);

class Router {
  public $routes = [];
  public function register(string $requestMethod, string $route, callable|array $action): self {
    $this->routes[$requestMethod][$route] = $action;

    return $this;
  }

  public function get(string $route, callable|array $action): self {
    return $this->register('get', $route, $action);
  }
  public function post(string $route, callable|array $action): self {
    return $this->register('post', $route, $action);
  }

  public function routes(): array {
    return $this->routes;
  }

  public function resolve(string $reqURL, string $requestMethod) {
    $route = explode('?', $reqURL)[0];
    $action = $this->routes[$requestMethod][$route] ?? NULL;

    if (!$action) {
      throw new Exception('Invalid route');
    }
    return call_user_func($action);
  }
}