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
//avaleht
$menuItemTmpl->set('menu_item_name', 'Avaleht');
$link = $http->getLink();
$menuItemTmpl->set('link', $link);
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//esimene
$menuItemTmpl->set('menu_item_name', 'esimene');
$link = $http->getLink(array('control' => 'esimene'));
$menuItemTmpl->set('link', $link);
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//teine
$menuItemTmpl->set('menu_item_name', 'teine');
$link = $http->getLink(array('control' => 'teine'));
$menuItemTmpl->set('link', $link);
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//täidame loodud elemendiga lehe menüü
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);