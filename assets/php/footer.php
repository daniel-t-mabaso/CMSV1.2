<?php
// A reusable footer script to be embedded onto every front facing page
open_special_row('primary-bg white-txt');

echo '<div class=" medium-padding center-txt"> </div>';

$page_titles = array();

$page_links = array();

$legal = ['Terms & Conditions', 'Privacy Policy', 'Cookie Policy'];

$legal_links = ['./legal.php#terms','./legal.php#privacy','./legal.php#cookies'];

$nav = ['Facebook', 'Instagram', 'Twitter', 'LinkedIn'];

$links = ['http://www.facebook.com/nonartyart', 'http://www.instagram.com/nonartyart', 'http://www.twitter.com/nonartyart', 'http://www.linkedin.com/company/nonartyart'];

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



    linked_ul('', [], [], 'list block float-left medium-side-padding');

    linked_ul('WEBSITE', $page_titles, $page_links, 'list block float-left medium-side-padding');

    linked_ul('LEGAL', $legal, $legal_links, 'list block float-left medium-side-padding');

    linked_ul('SOCIAL', $nav, $links, 'list inline-block medium-side-padding');

    echo "<div id='top' class='black-bg white-txt cursor z-20' onclick='scrollToTop()'><i class='fa fa-angle-up'></i><br><span>TOP</span></a></div>";

    echo "<div class='medium-padding italic block tertiary-txt center-txt'><a href='http://www.nonartyart.co.za'>Non-Artistic Art Developers</a></div>";

close_row();

?>