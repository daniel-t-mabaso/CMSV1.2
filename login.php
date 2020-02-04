<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php
        include 'assets/php/dependencies.php';
        include 'assets/php/server.php'?>
</head>
<body class="background-colour book">
    <?php include 'assets/php/header.php'?>

<?php
    open_row('');
    echo" ";
    close_row();
    open_row('');
    echo" ";
    close_row();
    open_row('');

    //create login form
    form('Login', 'Log in using your email.',['Email','Password'],[],'Sign In', 'center');
    
    // handle form errors on submit
    include 'error.php';
    
    echo "<div class='book center-txt'>Don't have an account? <a href='register.php' class='italic'>Sign up.</a></div>";
    echo "<div class='book center-txt'><a href='forgot.php' class='italic'>Forgot password</a></div>";
    close_row();
    open_row('');
    echo" ";
    close_row();
    open_row('');
    echo" ";
    close_row();
?>
<?php include 'assets/php/footer.php'?>
</body>
</html>