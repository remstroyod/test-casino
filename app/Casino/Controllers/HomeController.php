<?php
namespace Casino\Controllers;

use Casino\Services\View;

class HomeController extends BaseController
{

    public function __construct()
    {
        session_start();
    }

    /**
     * @return null
     */
    public function index()
    {

        return View::load('template/home');

    }

}
