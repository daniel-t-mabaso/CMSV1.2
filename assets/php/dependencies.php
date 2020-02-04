<?php
    // metadata, includes and other essential
    include './assets/php/class_lib.php';
    include './assets/php/modules.php';
    include 'connection.php';

    ?>

    <!--Meta Data-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="revisit-after" content="7 days">
    <meta name="description" content="">
    <meta name="url" content="">
    <meta name="designer" content="Non-Artistic Art, http://nonartyart.co.za">

    <!--Links-->
    <link rel='stylesheet' href='./assets/css/master.css'>
    <?php 
        $query = "SELECT * FROM images WHERE image_id = '1'";
        $result = mysqli_query($dbc, $query);
        $url = './assets/media/images/favicon.png';
        if (isset($result)){
            $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $url = $array['image_url'];
        }
        echo '<link rel="icon" type="image/png" href="'.$url.'">';
    ?>

    <!--Open Graph Meta Data-->
    <meta property="og:url" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>

    <!--Scripts-->
    <script type="text/javascript" src="./assets/js/behavior.js"></script>
    <script type="text/javascript" src="./assets/js/server.js"></script>
    <script type="text/javascript" src="./assets/js/cms.js"></script>

