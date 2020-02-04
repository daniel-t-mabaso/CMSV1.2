<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <?php
        include 'assets/php/dependencies.php';
    ?>
    <?php
    include 'assets/php/session.php';
    if (!$_SESSION['auth'] || (is_object($current_user) && ($current_user->get_type() !=null) && ($current_user->get_type() ==='regular' || $current_user->get_type() ==='unauthorised'))){
        header("Location:index.php"); /* Redirect browser */
    exit();
}
?>
    <link rel="stylesheet" href="./assets/css/dashboard.css">
</head>

<body onload="edit_page();">
    <?php
        include 'assets/php/header.php'
    ?>
    <div id="row-mobile-dashboard" class="">
        <!-- Display page for when user is not on PC -->
        <div class="medium-media"><img src="assets/images/laptop.png" width="60%" alt="laptop icon"></div>
        <h2>Please login using a PC/Laptop to access dashboard</h2>
    </div>
    <!-- Display dashboard when user is on PC -->
    <div id="row-dashboard">
        <div id="dashboard-navigation" class="primary-bg white-txt">
            <h2 class="heading">Dashboard</h2>
            <div class="dashboard-navigation-item" onclick='dashboardView("content");'>
                Website
            </div>
            <?php
                if($current_user->get_type() == 'admin' || $current_user->get_type() == 'root'){
            ?>
            <div class="dashboard-navigation-item" onclick='dashboardView("statistics");'>Statistics</div>
            <div class="dashboard-navigation-item" onclick='dashboardView("users");'>Users</div>
                <?php }?>
            <?php
                if($current_user->get_type() == 'root'){
            ?>
            <div class="dashboard-navigation-item" onclick='dashboardView("settings");'>Settings</div>
                <?php }?>
            <a href="assets/php/logout.php"><div class="dashboard-navigation-item">Logout</div></a>
        </div>
        <div id="dashboard-panel" class="small-padding">
            <div id="welcome-tab" class="dashboard-tabs">
                <h1>Welcome to Dashboard</h1>
                <p>Select from any one of the options below to continue:</p>
                <!-- Quick link panel -->
                <div id="dashboard-tab-quicklink-panel" class="">
                    <a><div class="dashboard-tab-quicklink white-bg" onclick='dashboardView("content");'>
                        <img class="tab-quicklink-icon" src="assets/images/content editor.png" alt="content editor icon"><br>
                        Website</div></a>
                        <?php
                            if($current_user->get_type() == 'admin' || $current_user->get_type() == 'root'){
                        ?>
                    <a><div class="dashboard-tab-quicklink white-bg" onclick='dashboardView("statistics");'>
                        <img class="tab-quicklink-icon" src="assets/images/statistics.png" alt="increasing graph icon"> <br> 
                        Statistics</div></a>
                    <a><div class="dashboard-tab-quicklink white-bg" onclick='dashboardView("users");'>
                        <img class="tab-quicklink-icon" src="assets/images/users.png" alt="users icon"><br>
                        Manage Users</div></a>
                            <?php }?>
                    <a href="assets/php/logout.php"><div class="dashboard-tab-quicklink white-bg">
                        <img class="tab-quicklink-icon" src="assets/images/logout.png" alt="logout icon"><br>
                        Logout</div></a>
                </div>
            </div>

            <!-- Dashboard content to manage overall content structure, image uploads and website theme -->
            <div id="content-tab" class="dashboard-tabs hide">

            <?php
                if($current_user->get_type() == 'admin' || $current_user->get_type() == 'root'){
                    // Dashboard tabs only available to Admins/root users 
            ?>
                <div class="card extra-small-width small-padding white-bg">
                    
                    <div class="extra-small-width">
                    <details><summary>Create a new page</summary><br>
                        <form onsubmit='request("page", "file-name"); return false;'> 
                            Title: <input onsubmit='request("page", "file-name"); return false;' type="text" class='form-input border extra-small-padding rounded' name='file' id="file-name">
                            <br><br>
                            <div class="button tertiary-bg center" type="submit"  onclick="request('page', 'file-name')">Create</div>
                        <span id="txtHint"></span>
                        </form></details>
                    </div>
                </div>

                <!-- Theme Management -->
                <div class="card extra-small-width small-padding white-bg">
                <details><summary>Theme</summary><br>
                    <div class="inline center-txt half-width"><input type="radio" name="theme-type" value="bg" checked> Background colour</div>
                    <div class="inline-block center-txt half-width"><input type="radio" name="theme-type" value="txt"> Font colour</div>
                        
                        <select class='form-input extra-small-padding border rounded' id='color-selection'>
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>
                            <option value="tertiary">Tertiary</option>
                            <option value="alternative">Alternative</option>
                            <option value="success">Success</option>
                            <option value="cation">Caution</option>
                            <option value="danger">Danger</option>
                        </select>
                        Colour:
                        <input type="text" class="half-width border extra-small-padding rounded" name='color' onkeyup="changeColour();" id='color-name'>
                        <div class="logo-width border rounded inline-block extra-small-padding"  id='color-div'>&nbsp;</div>
                        <br><br>
                        <div class='button tertiary-bg center' type='submit'  onclick="request('save', 'theme')">Save</div></details>
                </div>

                <!-- Image Management -->
                <div class="card extra-small-width small-padding white-bg">
                    <details>
                        <summary>Images</summary>
                        <br>
                        <form name='img-upload' action='upload.php/' method='post' id='img-upload'  enctype="multipart/form-data">
                            <div class="extra-small-width">
                                <input type="radio" name="icon-type" value="favicon" checked> Favicon &nbsp; &nbsp; &nbsp;
                                <input type="radio" name="icon-type" value="logo"> Logo &nbsp; &nbsp; &nbsp;
                                <input type="radio" name="icon-type" value="image"> Other
                            </div><br>
                            <input type="file" name="fileToUpload" id="fileToUpload"/><br><br>
                            Alternative text:
                            <input type="text" class="max-width border extra-small-padding rounded" name='description' id='color-name'>
                            <button class='button block tertiary-bg center' type='submit' name='img-upload' onclick="document.getElementById('img-upload').submit();">Upload</button></form>
                            </details>
                </div>
                <?php }?>

                <!-- Page Management -->
                <div class="card medium-width small-padding white-bg">
                <details><summary>Pages</summary>
                        <br>
                        <?php
                            $count = 0;
                            foreach($pages as $page){
                                $id = $page->get_id();
                                $title = $page->get_title();
                                $author = $page->get_author();
                                $date = $page->get_lastModified();
                                $visible = $page->get_visible();
                                $count++;
                                echo "<div><b>$count. $title</b> - by $author - last modified on $date";
                                if ($visible == 'true'){
                                    echo "- page is visible to the public.<br>";
                                    ?><div class='button white-txt inline-block caution-bg' onclick='request("hide-page", <?php echo "\"$id\"";?>);'>Hide</div> 
                                    <?php }
                                else{
                                    echo "- page is hidden to the public.<br>";
                                    ?><div class='button white-txt inline-block success-bg' onclick='request("show-page", <?php echo "\"$id\"";?>);'>Show</div>
                                    <?php 
                                }
                                ?><div class='button danger-bg white-txt inline-block' onclick='request("delete-page", <?php echo "\"$id\"";?>);'>Delete</div></div>
                                <?php
                            }
                        
                        ?>
                            </details>
                </div>
            </div>
            
            <?php
                if($current_user->get_type() == 'admin' || $current_user->get_type() == 'root'){
            ?>

            <!-- Site statistics tab -->
            <div id="statistics-tab" class="dashboard-tabs hide">
                <!-- User Statistics -->
                <div class='heading'>Site statistics</div>
                <div class="card medium-padding medium-width white-bg">
                    <?php
                        $activeCount = 0;
                        $inactiveCount = 0;
                        $unauthCount = 0;
                        $regularCount = 0;
                        $editorCount = 0;
                        $adminCount = 0;
                        $rootCount = 0;
                        foreach ($users as $user){
                            $q = $user->get_status();
                            $r = $user->get_type();
                            if ($q == 'active'){
                                $activeCount++;
                                switch ($r){
                                    case 'regular':
                                        $regularCount++;
                                        break;
                                    case 'editor':
                                        $editorCount++;
                                        break;
                                    case 'admin':
                                        $adminCount++;
                                        break;
                                    case 'root':
                                        $rootCount++;
                                        break;
                                    default:
                                        
                                    break;
                                }
                            }
                            else{
                                $unauthCount++;
                                }
                            }
                            echo "
                            <details><summary>Registered Users</summary>
                                <br><br>
                                <i>Sorted by active status</i>
                                <br><br>
                                Inactive users: $unauthCount<br>
                                Active users: $activeCount
                                <br><br>
                                <i>Sorted by account Type</i>
                                <br><br>
                                Unauthorised users: $unauthCount<br>
                                Normal users: $regularCount<br>
                                Editors: $editorCount<br>
                                Administrators: $adminCount<br>
                                Webmasters: $rootCount
                                <br><br>
                                Total users: ".count($users)."</details>";
                    ?>
                    
                </div>
                <!-- Business Partner Statistics -->
                <div class="card medium-padding medium-width white-bg">
                    <details><summary>Partners</summary><br><br>
                            No statistics available.
                </div>
                <!-- Location Statistics -->
                <div class="card medium-padding medium-width white-bg">
                    <details><summary>Location</summary><br><br>
                            No statistics available.
                </div>
                <div class="card medium-padding medium-width white-bg">
                    <details><summary>Pages</summary><br><br>
                            <?php
                                $shownPagesCount = 0;
                                $hiddenPagesCount = 0;
                                $totalPages = 0;
                                foreach($pages as $page){
                                    if($page->get_visible()=='true'){
                                        $shownPagesCount++;
                                    }
                                    else{
                                        $hiddenPagesCount++;
                                    }
                                    $totalPages++;
                                }
                                echo "Visible: $shownPagesCount<br>
                                Hidden: $hiddenPagesCount
                                <br><br>
                                Total pages: $totalPages</details>";
                            ?>
                </div>
            </div>

            <!-- Manage users tab -->
            <div id="users-tab" class="dashboard-tabs hide">
                <div class='heading'>Manage Users</div>
                <br>
                <?php
                    echo '
                    <div class="subheading">Active users</div>';
                    
                    $count_active = 0;
                    foreach ($users as $user){
                        
                        $q = $user->get_status();
                    
                        if ($q == 'active'){
                            
                            $count_active++;
                            $n = $user->get_name();
                            $m = $user->get_surname();
                            $p = $user->get_email();
                            $r = $user->get_type();
                            $s = $user->get_date();
                            echo "
                            <div class='card medium-padding small-width  white-bg'>
                            <details><summary>
                                $n $m</summary>
                                <div>Email: $p<br>
                                User type: $r<br>
                                Registed on: $s
                                </div>
                                <br>
                                <div class='down15'>";
                            if ($p != $current_user->get_email()){
                            switch ($r){
                                case 'regular':
                                    echo "<div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-editor\", \"$p\");'>Make Editor</div> &nbsp; <div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-admin\", \"$p\");'>Make Admin</div> &nbsp;";
                                    break;
                                case 'editor':
                                    echo "<div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-regular\", \"$p\");'>Make Regular</div> &nbsp; <div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-admin\", \"$p\");'>Make Admin</div> &nbsp;";
                                    break;
                                case 'admin':
                                    echo "<div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-regular\", \"$p\");'>Make Regular</div> &nbsp; <div class='button pad-sides-10 inline-block neutral-bg white-txt' onclick='request(\"make-editor\", \"$p\");'>Make Editor</div> &nbsp;";
                                    break;
                                case 'root':
                                    echo '<div class="italic danger-txt">Actions cannot be performed on root user.</div>';
                                break;
                                default:
                                    echo '<div class="italic danger-txt">No actions available.</div>';
                                break;
                            }
                        
                            if($r != 'root'){
                            echo "<div class='button pad-sides-10 inline-block caution-bg white-txt' onclick='request(\"deactivate\", \"$p\");'>Deactivate User</div></div>";}
                        }
                            else{
                                echo "<div class='italic danger-txt'>Actions cannot be performed on your own account.</div>";
                            }
                        
                            echo"
                            </details></div>";
                        }
                        
                        
                    }
                    
                    if ($count_active == 0){
                        echo 'No active users available.';
                    }

                    echo '<div class="subheading">Inactive users</div>';
                    $count_inactive = 0;
                    foreach ($users as $user){
                        
                        $q = $user->get_status();
                    
                        if ($q == 'inactive'){
                            $count_inactive++;
                            $n = $user->get_name();
                            $m = $user->get_surname();
                            $p = $user->get_email();
                            $r = $user->get_type();
                            $s = $user->get_date();
                            echo "
                            <div class='card medium-padding small-width white-bg'>
                                <details><summary>$n $m</summary><br>
                                <b>Email:</b> $p<br>
                                <b>Registed on:</b> $s<br>
                                <div class='down15'><div class='button pad-sides-10 inline-block success-bg white-txt' onclick='request(\"activate\", \"$p\")';>Activate User</div></div></div></details>";
                        }
                        
                    }
                    if ($count_inactive == 0){
                        echo '<div class="italic">No inactive users available.';
                    }
                ?>
                
            </div>
                <?php }?>
                
            <?php
                if( $current_user->get_type() == 'root'){
            ?>
            <div id="settings-tab" class="dashboard-tabs hide">
                <h1>Settings</h1>
            </div>
            <?php }?>
        
        </div>
    </div>
    <div id='top' class='black-bg white-txt cursor' onclick='scrollToTop()'><i class='fa fa-angle-up'></i><br><span>TOP</span></a></div>
</body>
</html>