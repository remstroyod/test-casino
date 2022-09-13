<?php
namespace Casino\Controllers;

use Casino\Services\View;

class ErrorController extends BaseController
{

    public function __construct()
    {
        //
    }

    /**
     * @return null
     */
    public function index()
    {

        return View::load('template/error');

    }

}
