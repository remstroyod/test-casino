<?php
namespace Casino\Services;

use Bramus\Router\Router;

class Routing {

    protected $router;

    public function __construct()
    {

        $this->router = new Router();
        $this->routes();

    }

    /**
     * @return void
     * @throws \Exception
     */
    private function routes(): void
    {

        $this->router->setNamespace('Casino\\Controllers');
        $this->router->get('/', 'HomeController@index');
        $this->router->post('/register', 'UserController@store');
        $this->router->get('/user/(.*)', 'UserController@show');

        $this->router->get('/404', 'ErrorController@index');
        $this->router->set404('ErrorController@index');

        $this->router->get('/destroy/{user}', 'UserController@destroy');
        $this->router->get('/update/(\d+)', 'UserController@update');

        $this->router->post('/spin/(\d+)', 'UserController@spin');

        $this->router->post('/history/(\d+)', 'UserController@history');

        $this->router->run();

    }

}
