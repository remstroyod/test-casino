<?php
namespace Casino\Controllers;

use Casino\Services\View;

class HomeController extends BaseController
{

    /**
     * @var View
     */
    protected View $view;

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
