<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 19.01.2018
 * Time: 10:22
 */

class template
{
    //klassi muutujad
    var $file = ''; //HTML malli faili nimi
    var $content = false; //HTML malli failist loetud sisu
    var $vars = array();//HTML malli elementide ja reaalväärtuste paarid

    //HTML malli failist sisu lugemine
    function readFile($file) {
        /*$fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        fclose($fp);*/
        $this->content = file_get_contents($file);
    }
}