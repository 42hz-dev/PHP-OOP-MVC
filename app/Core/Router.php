<?php
namespace App\Core;

class Router
{
    protected $routes = [];

    private function add(string $method, string $uri, string $controller): Router
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get(string $uri, string $controller) :Router
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller) :Router
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller) :Router
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch(string $uri, string $controller) :Router
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller) :Router
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function route(string $uri, string $method): string
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                require __DIR__ . "/../../resources/" . $route['controller'];
            }
        }

        return 'not found';
    }
}
