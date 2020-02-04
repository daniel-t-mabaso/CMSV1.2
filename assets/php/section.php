<!-- Page row/panel popup editor -->

<div class="card section-edit white-bg large-width primary-txt medium-small-height hide overflow-hidden background-bg" id="section-edit">
<div class='left primary-bg extra-small-width max-height white-txt center-txt'>
<div id='actions-cover' class='primary-bg max-width max-height z-20 absolute hide'></div>
<div id='actions-options'>
<div class="extra-small-height extra-small-line-height max-width subheading"> ACTION</div>
<input type='hidden' value='null' id='section-edit-action'/>
<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='style'>Section</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='text'>Add text</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='button'>Add button</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='circle'>Add circle</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='list'>Add list</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='card'>Add card</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='image'>Add image</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='video'>Add video</div>

<div class="tiny-height secondary-bg option-hover" onclick="changeSectionEditorActionPanel(this);" id='form'>Add form</div>
</div>
</div>
<div id="close-pop-up" class="danger-txt float-right subheading cursor" onclick="editSection(null);">✕</div><br>
 
<div class="medium-width left small-padding">

        <div id='edit-text-content'></div><div id='edit-section-content'>
            <div class= 'small-height max-width'>
                <div class="medium-width center">

                <b id="section-edit-heading" class="extra-small-side-padding heading">Editor<br><i class="book">&nbsp;&nbsp;&nbsp;Select an action on the left to continue.</i></b>
                
            <div class='minute-height'></div>
            <?php
            loadControls();?>
            
            <div class='minute-height'></div>
            </div>
                <div class="small-medium-height  scroll">
                    <?php
                    loadTools();
                    ?>
                </div>
            </div>
        </div>

        <div class='extra-small-height'></div>
    <div class="small-width right">
    <div class="button right inline-block success-bg white-txt" onclick="previewSection(null);">Preview</div>

    </div>

</div>
</div>



<?php

function font_size_options(){

    echo "<div id='font-size-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
            <select id='font-size-value' class='small-input-width extra-small-padding border'>
                <option disabled selected value> Font Size </option>
                <option class='title' value='title'>Font - XL</option>
                <option class='heading' value='heading'>Font - Large</option>
                <option class='subheading' value='subheading'>Font - Medium</option>
                <option class='book' value='book'>Font - Normal</option>
            </select>
        </div>";
}

function font_style_options(){
    echo "<div id='font-style-tool' class='extra-small-side-padding section-tool center-txt small-input-width hide left'>
            <input id='font_style' type='hidden' value='' name='font_style'/>
            <img class=' icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='bold' src='assets/media/images/bold_icon.png'/>
            <img class=' icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='italic' src='assets/media/images/italic_icon.png'/>
            <img class=' icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='underline' src='assets/media/images/underline_icon.png'/>
        </div>";
}

function list_type_options(){

    

    echo "<div id='list-type-tool' class='section-tool hide'>Select list type: 
                <select id='list-type-value' class='form-input extra-small-padding border  ' onchange='updateListFields()'>
                    <option disabled selected value='ul'> -- select list type -- </option>
                    <option value='ul'>Unordered list</option>
                    <option value='ull'>Unordered list (with links)</option>
                    <option value='ol'>Ordered list</option>
                    <option value='oll'>Ordered list (with links)</option>
                </select>
            <div id='list-input-panel'>

            <input class='form-input text-box extra-small-padding block border  ' type='text' placeholder='List item text' name='list-item-text'/>

            <input class='form-input text-box extra-small-padding block border   tertiary-bg hide' type='text' placeholder='List item link' name='list-item-link'/>

            </div>

            <div class='right-txt cursor' onclick='addListItems(this.parentElement)'>Add list item</div>

            </div>";

}

function form_options(){

    

    echo "<div id='form-tool' class='section-tool hide'>Select form type: <select id='form-type-value' class='form-input extra-small-padding border  ' onchange='updateFormFields()'>

                <option disabled selected value='ul'> -- select form type -- </option>

                <option value='contact'>Contact form</option>

                <option value='custom'>Custom form</option>

                </select>

            

            <input id='form-email' class='form-input text-box hide extra-small-padding block border  ' type='email' placeholder='Submit form to?' name='form-item-text'/>

            

            <div id='form-input-panel' class='hide'>

            <input class='form-input text-box extra-small-padding block border  ' type='text' placeholder='What is the title?' name='form-heading' id='form-heading'/>

            <input class='form-input text-box extra-small-padding block border  ' type='text' placeholder='What is on the submit button?' name='submit-text' id='submit-text'/>

            <div id='form-input-fields'><br>

            

            </div>

            <div id='add-short' class='right-txt cursor' onclick='addFormItems(this)'>Add short input field</div>

            <br>

            <div id='add-long' class='right-txt cursor' onclick='addFormItems(this)'>Add long input field</div>

            </div></div>

            ";

}

function position_options(){

    echo "<div id='position-tool' class='extra-small-side-padding section-tool center-txt small-input-width hide left'>
        <input type='hidden' value='' id='position' name='position'>
        <img class='tertiary-bg position-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='left' src='assets/media/images/align_left_icon.png'/>
        <img class='position-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='center' src='assets/media/images/align_center_icon.png'/>
        <img class='position-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='right' src='assets/media/images/align_right_icon.png'/>
    </div>";

}

function text_alignment_options(){

    echo "<div id='text-alignment-tool' class='extra-small-side-padding section-tool small-input-width hide center-txt left' value='default'>
        <input type='hidden' value='left-txt' id='alignment' name='alignment'>
        <img class='tertiary-bg alignment-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='left-txt' src='assets/media/images/justify_left_icon.png'/>
        <img class='alignment-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='center-txt' src='assets/media/images/justify_center_icon.png'/>
        <img class='alignment-tool-icon icon-square white-bg cursor border extra-small-padding' onclick='changeParentValue(this)' id='right-txt' src='assets/media/images/justify_right_icon.png'/>
    </div>";

}

function width_options(){

    echo "<div id='width-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
    <input list='widths' id='width' name='width' class='primary-txt small-input-width extra-small-padding border' placeholder='Width' value=''>

    <datalist id='widths'>
        <option value='auto'/>
        <option value='extra-small'/>
        <option value='small'/>
        <option value='medium'/>
        <option value='large'/>
        <option value='half'/>
        <option value='max'/>
    </datalist>
        </div>";

}

function height_options(){

    echo "<div id='height-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
            
            <input list='heights' id='height' value='' name='height' class='primary-txt small-input-width extra-small-padding border' placeholder='Height'>

            <datalist id='heights'>
                <option value='auto'/>
                <option value='extra-small'/>
                <option value='small'/>
                <option value='medium'/>
                <option value='large'/>
                <option value='half'/>
                <option value='max'/>
            </datalist>
        </div>";

}

function size_options(){

    echo "<div id='size-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
            <input list='sizes' id='size' value='extra-small' name='size' class='primary-txt small-input-width extra-small-padding border' placeholder='Size'>
            <datalist id='sizes'>
                <option value='auto/>
                <option value='extra-small'/>
                <option value='small'/>
                <option value='medium'/>
                <option value='large'/>
                <option value='half'/>
                <option value='max'/>
            </datalist>
        </div>";   

}



function short_text_box($str){

    echo"<div id='short-text-tool' class='section-tool hide'><input class='form-input text-box extra-small-padding block border  ' id='edit-short-text-input' type='text' placeholder='$str' name='section-add-text'/></div>";

}



function link_text_box($str){

    echo"<div id='link-text-tool' class='section-tool hide'><input class='form-input text-box extra-small-padding block border  ' id='edit-link-text-input' type='text' placeholder='$str' name='section-add-text'/></div>";

}

function long_text_box($str){

    echo"<div id='long-text-tool' class='section-tool hide'><textarea class='form-input text-box extra-small-padding block border  ' id='edit-long-text-input' rows='5' cols='30' placeholder='$str' name='section-add-text'></textarea></div>";

}

function font_colour_options(){

    echo "<div id='font-colour-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
    <select id='font-colour' name='font-colour' class='primary-txt small-input-width extra-small-padding border'>
        <option class='bold extra-small-padding' disabled selected value='primary'>Font Colour</option>
        <option class='primary-bg primary-txt cursor' value='primary'>Font - Primary</option>
        <option class='secondary-bg secondary-txt cursor' value='secondary'>Font - Secondary</option>
        <option class='tertiary-bg tertiary-txt cursor' value='tertiary'>Font - Tertiary</option>
        <option class='alternative-bg alternative-txt cursor' value='alternative'>Font - Alternative</option>
        <option class='black-bg black-txt cursor' value='black'>Font - Black</option>
        <option class='white-bg white-txt cursor' value='white'>Font - White</option>
        <option class='neutral-bg neutral-txt cursor' value='neutral'>Font - Neutral</option>
        <option class='success-bg success-txt cursor' value='success'>Font - Success</option>
        <option class='caution-bg caution-txt cursor' value='caution'>Font - Caution</option>
        <option class='danger-bg danger-txt cursor' value='danger'>Font - Danger</option>
    </Select>
        </div>";

}

function bg_colour_options(){

    echo "<div id='background-colour-tool' class='extra-small-side-padding section-tool small-input-width hide left'>
            <Select id='background_colour' name='background-colour' class='primary-txt small-input-width extra-small-padding border'>
                <option class='bold extra-small-padding' disabled selected value='primary'>Background Colour</option>
                <option class='primary-bg primary-txt cursor' value='primary'>BG - Primary</option>
                <option class='secondary-bg secondary-txt cursor' value='secondary'>BG - Secondary</option>
                <option class='tertiary-bg tertiary-txt cursor' value='tertiary'>BG - Tertiary</option>
                <option class='alternative-bg alternative-txt cursor' value='alternative'>BG - Alternative</option>
                <option class='black-bg black-txt cursor' value='black'>BG - Black</option>
                <option class='white-bg white-txt cursor' value='white'>BG - White</option>
                <option class='neutral-bg neutral-txt cursor' value='neutral'>BG - Neutral</option>
                <option class='success-bg success-txt cursor' value='success'>BG - Success</option>
                <option class='caution-bg caution-txt cursor' value='caution'>BG - Caution</option>
                <option class='danger-bg danger-txt cursor' value='danger'>BG - Danger</option>
            </Select>
        </div>";

}

function media_url(){

    echo"<div id='media-url-tool' class='section-tool hide'><input type='checkbox' id='media-background-check' onchange='updateMediaUrlInput(this);'>Insert media<span id='media-background-container' class='hide'><select class='form-input text-box extra-small-padding block border  ' id='media-url' name='media-url'><option disabled selected value> -- select file -- </option>";
    $files = scandir('assets/media/images/');
    foreach($files as $f){
        if($f == '.' || $f == '..'){}
            else{
        echo "<option value='$f'>$f</option>";}
    }
    $files = scandir('assets/media/videos/');
    foreach($files as $f){
        if($f == '.' || $f == '..'){}
            else{
        echo "<option value='$f'>$f</option>";}
    }
    echo "</select><div class='button center primary-bg white-txt' onclick='alert(\"You're being redirected to the dashboard in order to complete the upload.\");window.location.href = \"dashboard.php\";'>Upload new file</div></span></div><br>";

}

function loadTools(){

    /*Row three - modules*/
    short_text_box('What text should appear?');
    list_type_options();
    form_options();
    long_text_box('What text should appear?');
    link_text_box('What is the link?');
    media_url();





}

function loadControls(){
    echo "<div class='minute-margin minute-height max-width'>";
    /*Row one - section*/
    width_options();
    height_options();
    position_options();
    bg_colour_options();


    echo "</div><div class='minute-height minute-margin max-width'>";
    /*Row two - element*/
    font_size_options();
    font_style_options();
    text_alignment_options();
    font_colour_options();
    size_options();
    
    echo "</div>";
}
?>

