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

    //HTML malli faili nime ja õiguste kontroll
    //ning sisu lugemine siis, kui vajalikud tingimused on täidetud
    function loadFile() {
        if(!is_dir(VIEW_DIR)){
            echo 'Ei leia '.VIEW_DIR.' kataloogi';
            exit;
        }
        //kui faili nimi on määratud kujul
        //views/failinimi.html
        $file = $this->file; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            $this->readFile($file);
        }
        //kui faili nimi on määratud kujul
        //failinimi
        $file = VIEW_DIR.$this->file.'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        //kui fail asub alamkataloogis views/alamkaust/failinimi.html
        // kui faili nimi on määratud kujul
        //alamkaust.failinimi
        $file = VIEW_DIR.str_replace('.', '/', $this->file)->file.'.html'; //abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        //kui ikkagi on faili sisu puudu
        if($this->content === false){
            echo 'Ei suutnud lugeda '.$this->file.' sisu.</br>';
        }
    }

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file; //määrame kasutatava malli faili nime
        $this->loadFile(); //laeme määratud nimega faili sisu
    }

    //HTML malli failist sisu lugemine
    function readFile($file) {
        /*$fp = fopen($file, 'r');
        $this->content = fread($fp, filesize($file));
        fclose($fp);*/
        $this->content = file_get_contents($file);
    }

    //malli elemendi nime ja reaalväärtuse paari koostamine ja lisamine $this->vars massiivi sisse
    function set($name, $value){
        $this->vars[$name] = $value;
    }

    //täidame mallist loetud sisu reaalsete väärtustega ja anname muudetud sisu tagasi põhiprogrammile
    function parse(){
        $str = $this->content; //malli sisu algväärtus
        foreach ($this->vars as $name=>$value) {
            $str = str_replace('{'.$name.'}', $value, $str);
        }
        return $str;
    }
}