<?php
    	class Website{
            var $pages;
            var $users;
        
            function __construct(){
                $this->pages = array();
                $this->users = array();
        
            }
        
            /*SETTERS*/
            function set_pages($array){
                $this->pages = $array;
            }
            function set_users($array){
                $this->users = $array;
            }
            
            /*GETTERS*/
            function get_pages(){
                return $this->pages;
            }
            function get_users(){
                return $this->users;
            }

            function checkCreated($name){
                echo "<script>console.log('checkCreated called');</script>";
                foreach($this->pages as $page){
                    $t = $page->get_title();

                    echo "<script>console.log('$t vs $name');</script>";
                    if(strtolower($page->get_title())==strtolower($name)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
            }
        }
?>