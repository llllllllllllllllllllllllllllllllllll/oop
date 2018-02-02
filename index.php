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

//lubame kontrollerite kasutust
require_once 'control.php';

//määrame reaalväärtused
$mainTmpl->set('page_title', 'Lehe pealkiri');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Pealkiri');
$mainTmpl->set('lang_bar', 'Keeleriba');
$mainTmpl->set('content', 'Lehe vaikimisi sisu');
require_once 'menu.php';

echo $mainTmpl->parse();

//kontrollime control sisu
echo $http->get('control');