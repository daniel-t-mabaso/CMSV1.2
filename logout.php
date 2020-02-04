<?php

if(isset($_SESSION)){
    // Destroy the session if it's already started
    session_destroy();

}

else{
    // Create then destroy session if it's not started. Just in case some errors may arise.
    session_start();
    session_destroy();
}
// Relocate to index
header('location: ./');

?>