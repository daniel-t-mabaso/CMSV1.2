<?php
if (!isset($_SESSION)){

    session_start();}

    if(!isset($_SESSION['auth']) || !isset($_SESSION['user'])){

        $_SESSION['auth'] = false;

        $u = new User;

        $us = serialize($u);

        $_SESSION['user'] = $us;

    }

    $current_user = unserialize($_SESSION['user']);

?>