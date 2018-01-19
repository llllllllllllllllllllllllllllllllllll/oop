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

//määrame reaalväärtused
$testTabel->set('esimene', '1');
$testTabel->set('teine', '2');

//lisan objekti testvaate
echo '<pre>';
print_r($testTabel);
echo '</pre>';
echo $testTabel->parse();