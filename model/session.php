<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 14.02.18
 * Time: 14:53
 */

class session
{
    var $sid = false; //sessioni id
    var $vars = array(); //sessioni ajal tekkinud andmete hoidla
    var $http = false; //$http objekti jaoks
    var $db = false; //$db objekti jaoks
    var $timeout = 1800; //30 minutit sessiooni pikkus
    var $anonymous = true; //anonüümne sessioon lubatud

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    public function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
    }

    //loome sessiooni
    function sessionCreate($user = false){
        //kui kasutaja on anonüümne
        if($user == false) {
            //tekitame kasutaja andmed andmebaasi jaoks
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonüümne'
            );
            //loome sid
            $sid = md5(uniqid(time().mt_rand(1,1000), true));
            //salvestame andmed session tabelisse
            $sql = 'INSERT INTO session SET '.
            'sid='.fixDb($sid).', '.
                'user_id='.fixDb($user['user_id']).', '.
                'user_data='.fixDb(serialize($user)).', '.
                'login_ip='.fixDb(REMOTE_ADDR).', '.
                'created=NOW()';
            //saadame päringu andmebaasi
            $this->db->query($sql);
            //määrame sid $this->sid
            $this->sid=$sid;
            //lisame andmed $http objekti sisse
            //et nad oleks veebis kättesaadavad
            $this->http->set('sid', $sid);
        }
    }

    //funktsioon hakkab kustutama sessioone db tabelist
    function clearSessions() {
        $sql = 'DELETE FROM session WHERE '.
        time().' - UNIX_TIMESTAMP(changed) > '.
        $this->timeout;
        $this->db->query($sql);
    }

}