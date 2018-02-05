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
    }

    //loome paarid kujul nimi=väärtus
    //ühendame need kokku
    function addToLink(&$link, $name, $value){
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($value);
    }
    //loome täislingi põhilingi ja paaride kasutamisel
    function getLink($add = array()){
        $link = ''; //lingi loomiseks vajalik muutuja
        foreach ($add as $name => $value) {
            //koostame paaride komplektid
            $this->addToLink($link, $name, $value);
        }
        //siin paarid name=value&name1=value1 on olemas
        if($link != ''){
            $link = $this->baselink.'?'.$link;
        } else {
            //kui paarid ei ole moodustatud
            $link = $this->baselink;
        }
        //anname moodustatud lingi kasutamisele
        return $link;
    }
}