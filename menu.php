<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 11:03
 */
//loome menüü peamalli objekti template klassist
$menuTmpl = new template(VIEW_DIR.'menu.html');
//loome menüü elemendi peamalli objekti template klassist
$menuItemTmpl = new template(VIEW_DIR.'menu_item.html');

//menüü reaalväärtused
//esimene
$menuItemTmpl->set('menu_item_name', 'esimene');
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//teine
$menuItemTmpl->add('menu_item_name', 'teine');
$menuItem = $menuItemTmpl->parse();
$menuTmpl->add('menu_items', $menuItem);

//täidame loodud elemendiga lehe menüü
$menuTmpl->set('menu_items', $menuItemTmpl->parse());
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);