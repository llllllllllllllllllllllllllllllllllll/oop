<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 19.01.2018
 * Time: 11:09
 */
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
require_once 'menu.php';

echo $mainTmpl->parse();