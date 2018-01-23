<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 12:22
 */

class http
{
    //klassi muutujad
    var $vars = array(); //HTTP andmete massiiv($_GET, $_POST)
    var $server = array(); //serveri andmete massiiv($_SERVER)

    /**
     * http constructor.
     */
    public function __construct()
    {
        $this->init();
    }


    //loeme vajalikud väärtused sisse
    function init(){
        $this->vars = array_merge($_GET, $_POST);
        $this->server = $_SERVER;
    }
}