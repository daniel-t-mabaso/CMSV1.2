<?php

    include 'assets/php/server.php';

    $target_dir = "assets/media/images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $type = $_POST['icon-type'];
    $alt = $_POST['description'];
    $msg = '';

    if(isset($_POST['img-upload'])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $msg .= "File is not an image.";
            $uploadOk = 0;
        }


        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            $msg .= "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $msg .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. > $imageFileType";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            //echo "File already exists.";
            if($type == "favicon"){
                $sql = "UPDATE `images` SET `image_url` = '$target_file', `image_description` = '$alt' WHERE `image_id` = '1'";   
                mysqli_query($dbc, $sql);
            }
            else if($type == "logo"){
                $sql = "UPDATE `images` SET `image_url` = '$target_file', `image_description` = '$alt'  WHERE `image_id` = '2'";
                mysqli_query($dbc, $sql);
            }
            $uploadOk = -1;
        }
        if ($uploadOk == 0) {
            $msg .= "<br>Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else if ($uploadOk == -1) {
            $msg .= "<br>File updated.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                if($type == "favicon"){
                    $sql = "UPDATE `images` SET `image_url` = '$target_file', `image_description` = '$alt' WHERE `image_id` = '1'";   
                    mysqli_query($dbc, $sql);
                }
                else if($type == "logo"){
                    $sql = "UPDATE `images` SET `image_url` = '$target_file', `image_description` = '$alt'  WHERE `image_id` = '2'";
                    mysqli_query($dbc, $sql);
                }
                $msg .= "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                $msg .= "<br>Sorry, there was an error uploading your file.";
            }
    }
}
header("Location: ../dashboard.php?msg=$msg");

?>