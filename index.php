<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 19.01.2018
 * Time: 11:09
 */
/*/loeme sisse projekti konfiguratsiooni
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
echo $testTabel->parse();*/

//loeme sisse projekti konfiguratsiooni
require_once 'conf.php';

//loome peaobjekti template klassist
$mainTmpl = new template('main');

//määrame reaalväärtused
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Lehe pealkiri');
$mainTmpl->set('lang_bar', 'Pealkiri');
$mainTmpl->set('menu', 'Lehe menüü');
$mainTmpl->set('content', 'Lehe sisu');

echo $mainTmpl->parse();
