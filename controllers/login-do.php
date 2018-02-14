<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 14.02.18
 * Time: 14:18
 */
//vormi poolt tulnud andmed
$username = $http->get('username');
$password = $http->get('password');

//kontrollime nende sisu
echo $username.'<br>';
echo $password.'<br>';

//koostame päringu kasutaja kontrollimiseks
$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDb($username).
    ' AND password'.fixDb(md5($password));
$result = $db->getData($sql);

//kontrollime kas andmed on olemas
if($result != false) {
    //kasutajale tuleb avada töösessioon
    echo 'Oled sisse logitud<br>';
} else {
    //tuleb kasutaja tagasi suunata sisselogimisvormile
    echo 'Suuname sisselogimisele<br>';
    $link = $http->getLink(array('control' => 'login'));
    $http->redirect($link);
}