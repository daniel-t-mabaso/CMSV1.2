<?php @session_start();

    // Handles login and registration
    include 'connection.php';
    @include 'session.php';

    if($_SESSION['auth']===false){
        
        $errors = array();

        // echo 'not logged in';
        if(isset($_POST['login'])){
            
            $email = strtolower(mysqli_real_escape_string($dbc, $_POST['email']));
            $password = mysqli_real_escape_string($dbc, $_POST['password']);

            if (empty($email)){
                array_push($errors, "Email is required");
            }

            if (empty($password)){
                array_push($errors, "Password is required");
            }
            //continue to login
            if (count($errors)==0){
                //fetch data
                $query = "SELECT * FROM users WHERE user_email = '$email'";
                $result = mysqli_query($dbc, $query);
                if (isset($result)){
                    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $user_hash = $array['user_password'];
                    $user_type = $array['user_type'];
                    mysqli_free_result($result);
                    if (password_verify($password, $user_hash)){
                        $me = new User;
                        $me-> set_details($array['first_name'], $array['last_name'], $array['user_email'], $array['user_type'], $array['user_status'], $array['user_joined']);
                        $mes = serialize($me);
                        $_SESSION['auth'] = true;
                        $_SESSION['user'] = $mes;
                        $array="";
                        
                        echo '<script>
                        window.location = "index.php";
                        </script>';
                    }
                    else{
                        $user_hash="";
                        
                        array_push($errors, "Your email/password is incorrect.");
                    }

                }   
            } 
        }

        if (isset($_POST['register'])){
            $fname = mysqli_real_escape_string($dbc, $_POST['first-name']);
            $lname = mysqli_real_escape_string($dbc, $_POST['last-name']);
            $email = mysqli_real_escape_string($dbc, $_POST['email']);   
            $password1 = mysqli_real_escape_string($dbc, $_POST['password']);   
            $password2 = mysqli_real_escape_string($dbc, $_POST['confirm-password']);   
            
            if (empty($fname)){
                array_push($errors, "First name is required");
            }
            
            if (empty($lname)){
                array_push($errors, "Last name is required");
            }
            if (empty($email)){
                array_push($errors, "Email is required");
            }
            if (empty($password1)){
                array_push($errors, "Password is required");
            }
            if (strlen($password1) <6){
                array_push($errors, "Password must be at least 6 characters long");
            }
            if ($password1 != $password2){
                array_push($errors, "The two passwords do not match ");
            }

            $query = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($dbc, $query);
            if (isset($result) && mysqli_fetch_array($result, MYSQLI_ASSOC)['user_email']==$email){
                array_push($errors, "Email already in use");
            }
            mysqli_free_result($result);
            $query = "SELECT * FROM users WHERE user_email = '$email'";
            $result = mysqli_query($dbc, $query);
            if (isset($result) && mysqli_fetch_array($result, MYSQLI_ASSOC)['user_email']==$email){
                array_push($errors, "Email already registered");
            }
            mysqli_free_result($result);
            if (count($errors) == 0){
                $options = array('cost'=>11);
                
                $hash = password_hash($password1, PASSWORD_BCRYPT, $options);

                $sql = "INSERT INTO users (first_name, last_name, user_email, user_password, user_type, user_status)
                            VALUES ('$fname', '$lname','$email','$hash','regular', 'active')";
                mysqli_query($dbc, $sql);

                $me = new User;
                $me-> set_details($array['first_name'], $array['last_name'], $array['user_email'], $array['user_type'], $array['user_status'], $array['user_joined']);
                $mes = serialize($me);
                $_SESSION['auth'] = true;
                $_SESSION['user'] = $mes;

                echo '<script>
                window.location = "index.php";
                </script>';
            }
        
        }
    }
    else if($_SESSION['auth']===true){
    }
?>