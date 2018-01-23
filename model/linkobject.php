<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 12:52
 */

class linkobject extends http
{
    var $baselink = false; //põhilink
    var $protocol = 'https://';
    var $eq = '=';
    var $delim = '&amp;';

    /**
     * linkobject constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->baselink = $this->protocol.HTTP_HOST.SCRIPT_NAME;
        echo $this->baselink;
    }


}