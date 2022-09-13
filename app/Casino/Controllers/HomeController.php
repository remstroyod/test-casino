<?php
namespace Casino\Controllers;

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

        return $this->view->load('template/home');

    }

}
