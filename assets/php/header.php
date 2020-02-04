<?php

require_once 'assets/php/fetch_data.php';

// Header script for all front facing pages
$page_titles = array();

$page_links = array();

foreach($pages as $page){

    $visible = $page->get_visible();

    if($visible=='true'){ 

        $t = $page->get_title();


        array_push($page_titles, $page->get_title());

        if(strtolower($page->get_title())=='home'){

            array_push($page_links, 'index.php');

        }

        else{

        array_push($page_links, strtolower($page->get_title()).'.php');}

    }

}



    open_special_row(' fixed z-30 primary-bg white-txt');

    $query = "SELECT * FROM images WHERE image_id = '2'";
    $result = mysqli_query($dbc, $query);
    $logo = './assets/media/images/logo.png';
    if (isset($result)){
        $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $logo = $array['image_url'];
    }

        navigation($logo, $page_titles, $page_links);

    close_row();

    open_special_row('primary-bg  white-txt');

        echo '<div class="logo-height"></div>';

    close_row();

include 'assets/php/popup.php';

?>

<div id="screen-cover" class='hide' onclick="toggleMenu();"></div>