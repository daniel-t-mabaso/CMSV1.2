<?php

/** 

 * Contains all the modules, and elements that are used in HTML pages

 * 

*/



//buttons

function button($string, $url, $classes){

    echo "<a href='$url'><div class='button primary-bg white-txt $classes'>$string</div></a>";

}



//rows

function open_row($classes){
    // open tags for page panels/rows
    echo "<div class='row $classes'>

    <div class='content small-side-padding medium-padding'>";

}
function open_special_row($classes){
    // open tags for special rows with special content values
    echo "<div class='row $classes'>

    <div class='special-content small-side-padding medium-padding'>";

}



function open_blurred_row($height, $name){
    // open tags for rows with Media backgrounds
    $url = "assets/media/$name";

    $type = explode("/",$name);

    

    echo "<div class='row white-txt max-width $height-height hide-overflow'>

    <div class='blurred'></div>";



    if(strtolower($type[0]) == 'images'){

        echo "<img class='background-media' alt='background image' src='$url'/>";

    }



    else if (strtolower($type[0]) == 'videos'){

        echo "<video class='background-media' playsinline autoplay muted loop src='$url'></video>";

    }



    echo "<div class='content small-side-padding  medium-padding'>";

}



function close_row(){
// close row for end of page row/panel
    echo ' </div>

    </div>';

}



//lists

function ul($heading, $items, $classes){

    echo "<ul class='$classes'><div class='list-heading'>$heading</div>";

    foreach ($items as $i){

        echo "<li class='list-item'>$i</li>";

    }

    echo '</ul>';

}



function linked_ul($heading, $items, $links, $classes){

    echo "<ul class=' $classes'><div class='list-heading'>$heading</div>";

    if(count($items)==count($links)){

        for($i = 0; $i < count($items); $i++){

            $a = $links[$i];

            $b = $items[$i];

            echo "<li class='list-item'><a href='$a'>$b</a></li>";

        }

    }

    else{

        echo '<li>Items and links error. No items available to list</li>';

    }

    echo '</ul>';

}



function ol($heading, $items){

    echo "<ol><div class='list-heading'>$heading</div>";

    foreach ($items as $i){

        echo "<li class='list-item'>$i</li>";

    }

    echo '</ol>';

}

function linked_ol($heading, $items, $links){

    echo "<ol><div class='list-heading'>$heading</div>";

    if(count($items)==count($links)){

        for($i = 0; $i < count($items); $i++){

            $a = $links[$i];

            $b = $items[$i];

            echo "<li class='list-item'><a href='$a'>$b</a></li>";

        }

    }

    else{

        echo '<li>Items and links error. No items available to list</li>';

    }

    echo '</ol>';

}



//cards

function card($size, $string){

    echo "<div class='card $size-width white-bg shadow small-side-padding  $size-padding rounded'>$string</div>";

}



//text styles

function title($string){

    echo "<div class='title bold'>$string</div>";

}

function heading($string){

    echo "<div class='heading bold'>$string</div>";

}

function subheading($string){

    echo "<div class='subheading'>$string</div>";

}

function book($string){

    echo "<div class='book'>$string</div>";

}



//media

function media($width, $name, $description){

    $url = "assets/media/$name";

    $type = explode("/",$name);

    if(strtolower($type[0]) == 'images'){

        echo "<div class='$width-width'>

                <img class='fit' alt='$description' src='$url'/>

            </div>

        ";

    }



    else if (strtolower($type[0]) == 'videos'){

        echo "

            <div class='$width-width'>

                <video class='fit' playsinline autoplay muted loop src='$url'></video>

            </div>";

    }



}



function blurred_bg($name){

    $url = "assets/media/$name";

    $type = explode("/",$name);

    

    echo "<div class='blurred'></div>";



    if(strtolower($type[0]) == 'images'){

        echo "<img class='background-image' alt='background image' src='$url'/>";

    }



    else if (strtolower($type[0]) == 'videos'){

        echo "

            <div class='fit background-image'>

                <video class='fit' playsinline autoplay muted loop src='$url'></video>

            </div>";

    }

}

//profile picture

function profile_letter($string, $colour){

    echo "<div class='extra-small-square  hide-overflow $colour-bg white-txt extra-small-square-line-height circle center-txt'>";

     title($string);

     echo '</div>';

}

function profile_picture($url){

    echo "<div class='extra-small-square circle center-txt hide-overflow'>";

     echo "<img class='fit' src='assets/media/$url' alt='profile picture'>";

     echo '</div>';

}

//menu

function navigation($logo, $menu, $links){

    echo "<div class='nav-half-width mobile logo-height float-left left-txt'><a href='index.php'><img class='logo-height' src='$logo' alt='website logo'/></a></div>

            <div id='navigation-bar' class='nav-half-width mobile logo-height float-right right-txt white-txt'>
            
            <span id='navigation-bar'><div id='hamburger'>
            
            <div class='container' onclick='toggleMenu();' id='burger'>

            <div class='bar1'></div>

            <div class='bar2'></div>

            <div class='bar3'></div>

          </div>
          
          </div>";

        

        if(count($menu)==count($links) && count($links) != 0){

            for($i= 0; $i<count($menu);$i++){

                $item = $menu[$i];

                $link = $links[$i];

                echo "

                <a href='$link'><div class='nav-item hide max-width small-side-padding'>$item</div></a>";

            }

        }

        else if(count($links)==0){

            echo "<div class='nav-item hide small-side-padding'>Error: No menu items found</div>";

        }

        else{

            echo "<div class='nav-item hide small-side-padding'>Error: links don\'t match menu items</div>";

            

        }



        if($_SESSION['auth'] != true){

        echo "<a href='login.php'><div class='nav-item hide small-side-padding'>Login</div></a>

        <a href='register.php'><div class='nav-item hide small-side-padding'>Register</div></a>";

        }

        else{

            $current_user = unserialize($_SESSION['user']);

            $name1 = $current_user->get_name();

            $color = $current_user->get_type();

            if ($color == 'editor' || $color == 'admin' || $color == 'root' ){

                echo "<a href='dashboard.php'><div class='nav-item hide small-side-padding'>Dashboard</div></a>";

                echo "<a href='modules.php'><div class='nav-item hide small-side-padding'>Template</div></a>";

            }

            echo "

            <a href='logout.php'><div class='nav-item  hide small-side-padding'>Logout</div></a>

            <div class='nav-item hide small-side-padding $color-bg black-txt'>$name1</div>";

        }

        

        echo '</span>

            <div class="logo-height"></div></div>';
        //desktop navigatoin

        echo "<div class='desktop logo-height float-left left-txt'><a href='index.php'><img class='logo-height' src='$logo' alt='website logo'/></a></div>
        
        <div id='navigation-bar' class=' desktop logo-height float-right right-txt white-txt'>";
        if(count($menu)==count($links) && count($links) != 0){

            for($i= 0; $i<count($menu);$i++){

                $item = $menu[$i];

                $link = $links[$i];

                echo "

                <a href='$link'><div class='nav-item extra-small-side-padding'>$item</div></a>";

            }

        }

        else if(count($links)==0){

            echo "<div class='nav-item extra-small-side-padding'>Error: No menu items found</div>";

        }

        else{

            echo "<div class='nav-item extra-small-side-padding'>Error: links don\'t match menu items</div>";

            

        }



        if($_SESSION['auth'] != true){

        echo "<a href='login.php'><div class='nav-item italic extra-small-side-padding'>Login</div></a>";

        }

        else{

            $current_user = unserialize($_SESSION['user']);

            $name1 = $current_user->get_name();

            $color = $current_user->get_type();

            if ($color == 'editor' || $color == 'admin' || $color == 'root' ){

                echo "<a href='dashboard.php'><div class='nav-item extra-small-side-padding'>Dashboard</div></a>";

            }

            echo "
            <a href='logout.php'><div class='nav-item extra-small-side-padding'>Logout</div></a>
            <div class='nav-item extra-small-side-padding black-txt italic'>$name1</div>";

        }
        echo "</div>";


}



function form($title, $description, $input_labels, $textarea_labels, $submit, $classes){

    $t = strtolower($title);

    switch ($t){

        case 'login':

            break;

        case 'register':

            break;

        case 'contact':

            break;

        default:

        break;

    }



    echo "<div class='small-width small-padding small-side-padding $classes'>

            <div class='subheading inline'>$title</div>

            <div class='book inline'>$description</div>

            <form class='form' action='$t.php' method='post' name='$title-form'>

    ";



    foreach ($input_labels as $i){

        $a = join("-",explode(" ", strtolower($i)));

        if($a == 'password' || $a == 'confirm-password'){

            echo "<input type='password' class='form-input block extra-small-padding border ' name='$a' id='$a' placeholder='$i'/>";

        }

        else if($a =='email'){

            echo "<input type='email' class='form-input block extra-small-padding border ' name='$a' id='$a' placeholder='$i'/>";

        }

        else{

            echo "<input type='text' class='form-input block extra-small-padding border ' name='$a' id='$a' placeholder='$i'/>";

        }

    }



    foreach ($textarea_labels as $i){

        $a = join("-",explode(" ", $i));

        echo "<textarea class='form-input block extra-small-padding border ' name='$a' id='$a' placeholder='$i' rows='15' cols='30'></textarea>";

    }

    

    $a = strtolower($title);

    // echo "<div class='button primary-bg white-txt block center' name='$title' onclick='this.parentNode.submit();'>$submit</div></form></div>";

    echo "<input type='submit' class='button primary-bg white-txt block center' name='$a' value='$submit' /></form></div>";

}

?>