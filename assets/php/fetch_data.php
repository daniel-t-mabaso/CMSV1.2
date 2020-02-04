<?php @session_start();
    // Fetch website content and place in website object
    include './assets/php/connection.php';
    include './assets/php/session.php';
    include_once './assets/php/class_lib.php';
    
    // Fetch pages
    $query = "SELECT * FROM pages";
    $result = mysqli_query($dbc, $query);
    $pages = array();
    $users = array();
    
    if (isset($result)){
        
        while($row = mysqli_fetch_row($result)){
            
            $tmp_page = new Page;
            $id = $row[0];
            $title = $row[1];
            $content = $row[2];
            $lastModified = $row[3];
            $author = $row[4];
            $visible = $row[5];

            $tmp_page-> set_details($id, $title, $content, $lastModified, $author, $visible);

            array_push($pages, $tmp_page);
            
        }

        mysqli_free_result($result);

        //fetch users
        $query = "SELECT * FROM users";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_row($result)){
            $tmp_user = new User;
            $name = $row[1];
            $surname = $row[2];
            $email = $row[3];
            $type = $row[5];
            $status = $row[6];
            $date = $row[7];

            $tmp_user->set_details($name, $surname, $email, $type, $status, $date);
            
            array_push($users, $tmp_user);

        }
        mysqli_free_result($result);
        $users_list = array_values($users);
    }
    else{
    }

    // Put users and pages in website object 
    $content = new Website;
    $content->set_pages($pages);
    $content->set_users($users);
    //Serialize data
    $_SESSION['website'] = serialize($content);

?>
