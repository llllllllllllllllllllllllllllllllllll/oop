<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 19.01.2018
 * Time: 9:44
 */
// kaustade ja failide konstantsed nimetused
define('MODEL_DIR', 'model/');
define('VIEW_DIR', 'views/');
define('CONTROL_DIR', 'controllers/');

//nõuame vajalike failide kasutamist
require_once MODEL_DIR.'template.php';
require_once MODEL_DIR.'http.php';
require_once MODEL_DIR.'linkobject.php';

//loome objektid, mida on vaja pidevalt kasutada
$http = new linkobject();