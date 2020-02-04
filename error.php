<!-- Error Script for form handling -->

<?php

    if (count($errors)>0): 
        // if there are errors, display them
?>
<div class="login-error center-txt danger-txt italic" id='login-error'>
<div class="center-txt subheading">Error</div>
    <?php
        foreach ($errors as $error):
            //loop through each error and display it
    ?>
        <p><?php echo $error;?></p>

    <?php endforeach?>
    <!-- Button to go back to the form -->
    <!-- <a href="javascript:history.go(-2)"><div class='button center white-txt primary-bg'>Return to form</div></a> -->
</div>

<?php endif?>

