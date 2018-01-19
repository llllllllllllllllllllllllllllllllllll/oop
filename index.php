<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 19.01.2018
 * Time: 11:09
 */
//loeme sisse projekti konfiguratsiooni
require_once 'conf.php';

//loome testobjekti template klassist
$testTabel = new template('test');

//lisan objekti testvaate
echo '<pre>';
print_r($testTabel);
echo '</pre>';