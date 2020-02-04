<?php session_start();?>
<!-- This page shows all available modules and what they look like by default -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Template</title>
    <?php include 'assets/php/dependencies.php';?>
</head>
<body class="background-colour book primary-txt">
    <?php include 'assets/php/header.php'?>
    <!-- Font and colour Modules -->
    <?php open_row('black-bg white-txt');?>
            <?php title('Title')?>
    <?php close_row();?>

    <?php open_row('danger-bg primary-txt');?>
            <?php heading('Heading')?>
    <?php close_row();?>
    
    <?php open_row('success-bg primary-txt');?>
        <?php subheading('Subheading')?>
    <?php close_row();?>
    
    <?php open_row('caution-bg primary-txt');?>
        <?php book('Body text')?>
    <?php close_row();?>
    
    <!-- Button modules -->
    <?php open_row('background-bg primary-txt');?>
        
            <?php button("Views from above",'','');?>
            <?php button("Read more", '', 'center');?>
            <?php button("Done", '', 'success-bg primary-txt inline-block');?>
            <?php button("Cancel", '',  'caution-bg primary-txt inline-block');?>
            <?php button("Delete", '',  'danger-bg primary-txt inline-block');?>
            <?php button("Delete", '',  'danger-bg primary-txt center');?>
        
    <?php close_row();?>

    <!-- profile picture modules -->
    <?php open_row('');?>
        <?php profile_letter('F', 'inline-block success');?>
        
        <?php profile_letter('G', 'inline-block black');?>
        <?php profile_picture('images/square_placeholder.jpg');?>
    <?php close_row();?>
    
    <!-- list modules -->
    <?php open_row('');?>
        <?php
            $items = ['item 1', 'item 2', 'item 3', 'item 4'];
            $links = ['#', '#', '#', '#'];
            $errorLinks = ['#'];
            ul("Test list", $items,'');
            ol("Test list", $items);
            linked_ul("Test list with links", $items, $links, 'list');
            linked_ul("Test list with links", $items, $errorLinks, '');
            linked_ol("Test list with links", $items, $links);
            linked_ol("Test list with links", $items, $errorLinks);
        ?>
    <?php close_row();?>

    <!-- Card modules -->
    <?php open_row('');?>
        <?php
            card('extra-small','XS Card how about more content in here');
            card('small','Small card');
            card('medium','Medium card');
            card('large','Large card');
        ?>
    <?php close_row();?>


    <!-- Image Modules -->
    <?php open_row('');?>
        <?php
            media('extra-small','images/placeholder.jpg','Dummy image');
            media('small','images/placeholder.jpg','Dummy image');
            media('medium','images/placeholder.jpg','Dummy image');  
            media('large','images/placeholder.jpg','Dummy image');
        ?>
    <?php close_row();?>

    <!-- Image Background module -->
    <?php open_blurred_row('medium','images/placeholder.jpg');?>
        Blurred background with image background. Medium height.
    <?php close_row();?>

    <!-- Video Modules -->
    <?php open_row('');?>
        <?php
            media('extra-small','videos/placeholder.mp4','Dummy video');
            media('small','videos/placeholder.mp4','Dummy video');
            media('medium','videos/placeholder.mp4','Dummy video');  
            media('large','videos/placeholder.mp4','Dummy video');
        ?>
    <?php close_row();?>

    <!-- Video Background module -->
    <?php open_blurred_row('max','videos/placeholder.mp4');?>
        Blurred background with video background. Max height.
    <?php close_row();?>

    <!-- Form module -->
    <?php open_row('');?>
        <?php form('Contact', 'Contact us today!', ['Full Name','Email','Subject'], ['Message'], 'Send','');?>    <?php close_row();?>
    

    <?php include 'assets/php/footer.php';include 'assets/php/edit_page.php';?>
</body>
</html>