<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 12.02.18
 * Time: 9:52
 */
// loome sisselogimis vormi objekt
$loginForm = new template('login');
// paneme paika väärtused malli sisustamiseks
$loginForm->set('kasutaja', 'Kasutajanimi');
$loginForm->set('parool', 'Kasutaja parool');
$loginForm->set('nupp', 'Logi sisse!');

// loome link vorm töötluseks
$link = $http->getLink(array('control'=>'login_do'));
$loginForm->set('link', $link);

// paneme väärtused malli
// selleks oleks vaja trükida välja
// sisse logimisvorm {content} elemendis
$mainTmpl->set('content', $loginForm->parse());