<?php
namespace Casino\Controllers;

use Casino\Models\User;
use Casino\Services\View;

class HomeController
{

    /**
     * @var View
     */
    protected $view;

    public function __construct()
    {

        $this->view = new View();

    }

    /**
     * @return null
     */
    public function index()
    {


        $user = new User();
        $test = $user->getUser(1);

        return $this->view->load('template/home', ['user' => $test]);

    }

}
