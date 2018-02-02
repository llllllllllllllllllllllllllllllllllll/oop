<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 2.02.18
 * Time: 10:52
 */

class mysql
{
    //klassi väljad
    var $conn = false; //ühendus db serveriga
    var $host = false; //db serveri nimi/ip
    var $user = false; //db parool
    var $pass = false; //db parool
    var $dbname = false;  //db nimi

    /**
     * mysql constructor.
     * @param bool $host
     * @param bool $user
     * @param bool $pass
     * @param bool $dbname
     */
    public function __construct($host, $user, $pass, $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect(); //ühenduse loomine
    }

    //funktsioon db serveriga ühenduse loomiseks
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if($this->conn == false) {
            echo 'probleem andmebaasi ühendamisega<br>';
            exit;
        }
    }


}