<?php

class Core
{

    public function __construct(
        private $controller = 'Pages',
        private $method = 'index',
        private array $params = []
    ) {
        $url = $this->getUrl();


        if (isset($url[0]) && file_exists(APP_ROOT . '/controllers/' . ucwords($url[0]) . '.php')) {

            $this->controller = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {

            $this->method = $url[1];
            unset($url[1]);
        }

        if (!empty($url)) {

            $this->params = array_values($url);
        }

        return call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function getUrl()
    {

        if (isset($_GET['url'])) {

            $url = rtrim($_GET['url'], '/');

            $url = filter_var($url, FILTER_SANITIZE_URL);

            return explode('/', $url);
        } else {

            return [];
        }
    }
}
