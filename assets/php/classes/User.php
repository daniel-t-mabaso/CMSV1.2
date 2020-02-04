<?php

class User{
    var $name;
    var $surname;
    var $email;
    var $type;
    var $status;
    var $date;

    /*CONSTRUCTOR*/
    function __construct(){
        $this->name = "";
        $this->surname = "";
        $this->email = "";
        $this->date = "";
        $this->type = '';
        $this->status = '';
    }
    

    /*SETTERS*/
    function set_details($user_name, $user_surname, $user_email, $user_type, $user_status, $join_date){
        $this->name = $user_name;
        $this->surname = $user_surname;
        $this->email = $user_email;
        $this->type = $user_type;
        $this->status = $user_status;
        $this->date = $join_date;
    }
    function set_name($name){
        $this -> name = $name;
    }

    function set_surname($surname){
        $this -> surname = $surname;
    }

    function set_email($email){
        $this -> email = $email;
    }
    function set_dp_url($url){
        $this -> dp_url = $dp_url;
    }
    function set_type($type){
        $this -> type = $type;
    }
    function set_status($status){
        $this -> status = $status;
    }
    function set_date($join_date){
        $this -> date = $join_date;
    }

    /*GETTERS*/        
    function get_name(){
        return $this -> name;
    }

    function get_surname(){
        return $this -> surname;
    }
    function get_full_name(){
        $f = $name.' '.$surname;
        return $f;
    }
    function get_email(){
        return $this -> email;
    }
    function get_dp_url(){
        return $this -> dp_url;
    }
    function get_type(){
        return $this -> type;
    }
    function get_status(){
        return $this -> status;
    }
    function get_date(){
        return $this ->date;
    }

}
class Admin extends User{

    /*CONSTRUCTOR*/
    function __construct(){
        parent::__construct();
        parent::set_permission('admin');
        $this->node = null;
    }
    /*SETTERS*/
    function set_details($user_name, $user_surname, $user_email, $user_type, $user_status, $join_date){
        parent::set_details($user_name, $user_surname, $user_email, 'admin', 'active', $join_date);
    }
    /*GETTERS*/

    /*Methods*/
    function update_user($email, $action){
        //update user status or permission level
        switch($action){
            //active status
            case 'activate':
                echo "<script>console.log('Success: Performing action '$role' on user '$email')</script>";
                break;
            case 'dactivate':
                echo "<script>console.log('Success: Performing action '$role' on user '$email')</script>";
                break;
            //permission level
            case 'regular':
                echo "<script>console.log('Success: Performing action '$role' on user '$email')</script>";
                break;
            case 'editor':
                echo "<script>console.log('Success: Performing action '$role' on user '$email')</script>";
                break;
            case 'admin':
                echo "<script>console.log('Success: Performing action '$role' on user '$email')</script>";
                break;
            //error when action is not one listed above
            default:
                echo "<script>console.log('Error: Failed to perform action '$role' on user '$email')</script>";
                break;
        }
    }

    function update_content($id, $content){
        //update content on db
    }
}

?>