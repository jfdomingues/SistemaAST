<?php

namespace App\core;

class Router
{
    private $controller = 'site';
    private $method = 'home';
    private $param = [];

    public function __construct()
    {
        $router = $this->url();

        /*
        #verifica se existe a classe dentro da pasta controller
        #Existindo passa a posição 0 para dentro do controller
        */
        if(file_exists('app/core/' . ucfirst($router[0]) . '.php'))
        {
            $this->controller = $router[0];
            unset($router[0]);
        }

        #Cria class e objeto
        //$class = "\\App\\controller\\" . ucfirst($this->controller);
        $class = "\\App\\core\\" . ucfirst($this->controller);

        $object = new $class;

        #Passando router[1] para method
        if(isset($router[1]) and method_exists($class, $router[1]))
        {
            $this->method = $router[1];
            unset($router[1]);
        }

        #Passando router[2] para parametro
        $this->param = $router ? array_values($router) : [];

        //Para funcionar
        call_user_func_array([$object, $this->method], $this->param);
    }

    public function url()
    {
        $url = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_URL));
        return $url;
    }

}