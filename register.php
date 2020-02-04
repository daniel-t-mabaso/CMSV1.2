<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template</title>
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
    form('Register', 'Sign up for a new account below',['First Name', 'Last Name','Email','Password', 'Confirm Password'],[],'Register', 'center');
    
    include 'error.php';

    echo "<div class='book center-txt'>Already have an account? <a href='login.php' class='italic'>Sign in.</a></div>";
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