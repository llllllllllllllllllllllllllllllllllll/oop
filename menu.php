<?php
/**
 * Created by PhpStorm.
 * User: aleksander
 * Date: 23.01.2018
 * Time: 11:03
 */
//loome menüü peamalli objekti template klassist
$menu = new template('menu.menu');
//loome menüü elemendi peamalli objekti template klassist
$menuItem = new template('menu.menu_item');

// koostame päringu menüü ja sisu ülesehitamiseks
$sql = 'SELECT content_id, content, title '.
        'FROM content WHERE parent_id='.fixDb(0).
        ' AND show_in_menu='.fixDb(1);
// küsime andmed andmebaasist
$result = $db->getData($sql);
// ehitame menüü
if($result != false){
        foreach ($result as $page){
                $menuItem->set('menu_item_name', $page['title']);
                $link = $http->getLink(array('page_id'=>$page['content_id']));
                $menuItem->set('link', $link);
                $menu->add('menu_items', $menuItem->parse());
            }
}

// lisame lisaelemendid, mis ei ole andmebaasist tulemas

// katsetamiseks lisan uus konstant, mis määrab kasutaja
// id - sellest lähtun, kas kasutajale on võimalik
// antud menüü element näidata või mitte
define('USER_ID', 0); // mitte sisse logitud kasutaja
// näitame sisselogimine neile, kes ei ole sisse logitud
if(USER_ID == ROLE_NONE){
        $menuItem->set('menu_item_name', 'Logi sisse');
        $link = $http->getLink(array('control'=>'login'));
        $menuItem->set('link', $link);
        $menu->add('menu_items', $menuItem->parse());
}

$mainTmpl->add('menu', $menu->parse());