<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 11:03
 */
//loome menüü peamalli objekti template klassist
$menuTmpl = new template('menu.menu');
//loome menüü elemendi peamalli objekti template klassist
$menuItemTmpl = new template('menu.menu_item');

//menüü reaalväärtused
//esimene
$menuItemTmpl->set('menu_item_name', 'esimene');
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);


//loome lingi
$link = $http->getLink(array('control'=> 'esimene'));
$menuItem = $menuItemTmpl ->parse();

//teine
$menuItemTmpl->add('menu_item_name', 'teine');
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//loome teise lingi
$link = $http->getLink(array('control' => 'teine'));
$menuItem = $menuItemTmpl ->parse();

//täidame loodud elemendiga lehe menüü
$menuTmpl->set('menu_items', $menuItemTmpl->parse());
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);