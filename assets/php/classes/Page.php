<?php
    class Page{
        var $title;
        var $content;
        var $lastModified;
        var $author;
        var $visible;
        var $id;

        function __construct(){
            $this->id = '';
            $this->title = '';
            $this->content = '';
            $this->lastModified = '';
            $this->author = '';
            $this->visible = false;
    
        }

        function set_details($id, $title, $content, $lastModified, $author, $visible){
            $this->title = $title;
            $this->id = $id;
            $this->content = $content;
            $this->lastModified = $lastModified;
            $this->author = $author;
            $this->visible = $visible;
        }
//setters
        function set_title($title){
            $this->title = $title;
        }
        function set_content($content){
            $this->content = $content;
        }
        function set_lastModified($date){
            $this->lastModified = $date;
        }
        function set_author($author){
            $this->author = $author;
        }
        function set_visible($visible){
            $this->visible = $visible;
        }
//getters
        function get_id(){
            return $this->id;
        }
        function get_title(){
            return $this->title;
        }
        function get_content(){
            return $this->content;
        }
        function get_lastModified(){
            return $this->lastModified;
        }
        function get_author(){
            return $this->author;
        }
        function get_visible(){
            return $this->visible;
        }

        //methods
        function update_db(){
            //save new content to db
            $id = $this->id;
            $time = date_create()->format('d-m-Y H:i:s');
            $sql = "UPDATE `pages` SET `title` = '$title', `content` = '$content', `last_modified` = '$time', `author` = '$author', `visible` = '$visible' WHERE `page_id` = '$id'";
            mysqli_query($dbc, $sql);
        }
    }
?>