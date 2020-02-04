<?php session_start();

    // handle Ajax Requests
    include 'connection.php';
    include 'class_lib_direct.php';

    function checkCreated($name, $dbc){
        $nameInUpper = ucfirst($name);
        $query = "SELECT * FROM pages";
        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_row($result)){
            if($row[1] == $nameInUpper){
                return true;
            }
        }
        return false;
    }
    @include 'session.php';

    $q = $_REQUEST["q"];
    $name = $_REQUEST["id"];
    switch($q){
    case 'page':
            if(!checkCreated($name, $dbc)){
                $name = ucfirst($name);
                $author = $current_user->get_email();
                $time = date_create()->format('d-m-Y H:i:s');
                $content = '<?php $n'."='$name'; include 'assets/php/structure.php'?>";
                $filename = strtolower($name).".php";
                if ($name=='Home'){
                    $filename = 'index.php';
                }

                $handle = fopen('../../'.$filename, 'w') or die('cannot open the file');
                fclose($handle);
                echo "<span class='heading success-txt'>Success</span><br>Page '$filename' successfully created.<br><br><a href='$filename'><div class='button success-bg center'>View Page</div></a>";

                $handle = file_put_contents('../../'.$filename,$content);

                $content = mysqli_real_escape_string($dbc, "");
                $sql = "INSERT INTO pages (page_title, page_content, last_modified, page_author, page_visible)
                VALUES ('$name', '$content','$time','$author', 'false')";
                mysqli_query($dbc, $sql) or die(mysqli_error($dbc));
            }
            else{
                echo "Error: Page already exists.";
            }
        
        
        break;
    case 'make-regular':
        //make user  regular
        $sql = "UPDATE `users` SET `user_type` = 'regular' WHERE `user_email` = '$name'";
        mysqli_query($dbc, $sql);
        echo "User with email '$name' has been made a regular user.<br><br>Automatically refreshing page...";
        break;
    case 'make-editor':
        //make user editor
        $sql = "UPDATE `users` SET `user_type` = 'editor' WHERE `user_email` = '$name'";
        mysqli_query($dbc, $sql);
        echo "User with email '$name' has been made an editor.<br><br>Automatically refreshing page...";
        break;
    case 'make-admin':
        //make user admin
        $sql = "UPDATE `users` SET `user_type` = 'admin' WHERE `user_email` = '$name'";
        mysqli_query($dbc, $sql);
        echo "User with email '$name' has been made an administrator.<br><br>Automatically refreshing page...";
        break;
    case 'show-page':
        //make user admin
        if(is_numeric($name)){
            $sql = "UPDATE `pages` SET `page_visible` = 'true' WHERE `page_id` = '$name'";}
            else{
                $sql = "UPDATE `pages` SET `page_visible` = 'true' WHERE `page_title` = '$name'";
            }
        mysqli_query($dbc, $sql);
        echo "Page visibility updated.<br><br>Automatically refreshing page...";
        break;
    case 'hide-page':
        //make user admin
        if(is_numeric($name)){
        $sql = "UPDATE `pages` SET `page_visible` = 'false' WHERE `page_id` = '$name'";}
        else{
            $sql = "UPDATE `pages` SET `page_visible` = 'false' WHERE `page_title` = '$name'";
        }
        mysqli_query($dbc, $sql);
        echo "Page visibility updated.<br><br>Automatically refreshing page...";
        break;
    case 'publish-page':
        //make user admin
        
        $content = mysqli_real_escape_string($dbc,explode('`', $name)[1]);
        $name =explode('`', $name)[0];
        if(is_numeric($name)){
        $sql = "UPDATE `pages` SET `page_content` = '$content' WHERE `page_id` = '$name'";}
        else{
            $sql = "UPDATE `pages` SET `page_content` = '$content' WHERE `page_title` = '$name'";
        }
        mysqli_query($dbc, $sql);
        echo "Page content successfully updated.<br><br>Automatically refreshing page...";
        break;
    case 'delete-page':
        //make user admin
        if(is_numeric($name)){
        $query = "SELECT * FROM pages  WHERE page_id = '$name'";}
        else{
            $query = "SELECT * FROM pages  WHERE page_title = '$name'";
        }
        $result = mysqli_query($dbc, $query);
        $file = strtolower(mysqli_fetch_row($result)[1]);
        $myFile = "../../$file.php";
        if($file=='home'){
            $myFile = "../../index.php";
        }
        unlink(strtolower($myFile)) or die("Couldn't delete file");
        if(is_numeric($name)){
        $sql = "DELETE FROM `pages` WHERE `page_id` = '$name'";}
        else{
            $sql = "DELETE FROM `pages` WHERE `page_title` = '$name'";
        }
        mysqli_query($dbc, $sql);
        echo "Page deleted.<br><br>Automatically refreshing page...";
        break;
    case 'deactivate':
        //deactivate user
        $sql = "UPDATE `users` SET `user_status` = 'inactive' WHERE `user_email` = '$name'";
        mysqli_query($dbc, $sql);
        echo "User with email '$name' has been deactivated.<br><br>Automatically refreshing page...";
        break;
    case 'activate':
        //activate user
        $sql = "UPDATE `users` SET `user_status` = 'active' WHERE `user_email` = '$name'";
        mysqli_query($dbc, $sql);
        echo "User with email '$name' has been activated.<br><br>Automatically refreshing page...";
        break;
    case 'save':
        //save content to server db
        echo "Saving ";
        if(strpos($name, '-txt') || strpos($name, '-bg')){
            $tmps = explode(':', $name);
            $class = $tmps[0];
            $color = $tmps[1];
            
            $css = file_get_contents("../css/theme.css");
            echo "$color as new colour for $class in theme.css.";

            $css = explode(':',$css);
            for($i=0; $i<count($css); $i++){
                if(strpos($css[$i], $class)){
                    $tm = explode(";",$css[$i+1]);
                    $tm[0] = ' '.$color.'';
                    $css[$i+1] = join(";", $tm);
                    break;
                }
            }

            $css = join(":", $css);


            $myfile = fopen("../css/theme.css", "w") or die("Unable to open file!");
            fwrite($myfile, $css);
            fclose($myfile);
        }
        break;
    case 'delete':
        //delete content from server db
        echo "Deteled";
        break;
    }
?>