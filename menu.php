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
//loome ühe menüü elemendi
$menuItemTmpl->set('menu_item_name', 'esimene');
$menuItem = $menuItemTmpl->parse();
$menuTmpl->set('menu_items', $menuItem);
echo '<pre>';
print_r($menuItemTmpl);
echo '</pre>';
//täidame loodud elemendiga lehe menüü
$menuTmpl->set('menu_items', $menuItemTmpl->parse());
$menu = $menuTmpl->parse();
$mainTmpl->set('menu', $menu);