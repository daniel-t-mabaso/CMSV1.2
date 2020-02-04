function cms(request){
    switch(request){
        case 'new-section':
            var doc = document.getElementById('html-content');
            var old = doc.innerHTML;
            doc.innerHTML = old + "<div class='row hide-overflow white-bg max-width small-height primary-txt'><div class='blurred'></div><div class='background-media hide-overflow'><img id='background-image-url' alt='background image' class='max-width' src='assets/media/images/placeholder.jpg'/></div><div class='content center small-side-padding  small-height medium-padding'><div id='row-edit-container' class='edit-buttons float-right' style='display: block;'><div class='edit-button inline-block center-txt white-txt extra-small-padding cursor hide neutral-bg' onclick='editSection(this.parentElement)'>Edit</div><div class='edit-button inline-block center-txt white-txt float-right extra-small-padding cursor hide danger-bg' onclick='deleteSection(this.parentElement.parentElement);'>Delete</div></div></div</div>";
            break;
    }
}

function toggleEditPanel(){
    document.getElementById("edit-page-panel").classList.toggle("hide");
    var txt = document.getElementById("edit-page-button").innerHTML;
    if (txt.localeCompare('Hide')){
        document.getElementById("edit-page-button").innerHTML = "Hide";}
    else{
        document.getElementById("edit-page-button").innerHTML= "<div class='edit-icon'><img class='logo-width' src='assets/images/edit-page-icon.png'><div>Edit Page</div></div>";
    }
}

var row;
function editSection(obj){
    if(!document.getElementById('actions-cover').classList.contains('hide')){
        document.getElementById('actions-cover').classList.add('hide');
        document.getElementById('actions-options').classList.remove('hide');
    }
    var div = document.getElementById('section-edit');
    var m = document.getElementById('pop-up-msg');
    m.innerHTML = '<div class="subheading">Editor</div>';
    div.classList.toggle('hide');
    document.getElementById('screen-cover').classList.toggle('hide');
    row = obj;
    
    var txt = document.getElementById('edit-text-content');
    var section = document.getElementById('edit-section-content');
    
        section.classList.remove('hide');
        txt.classList.add('hide');
}
function editCard(obj){
    var div = document.getElementById('section-edit');
    var m = document.getElementById('pop-up-msg');
    m.innerHTML = '<div class="subheading">Editor</div>';
    div.classList.toggle('hide');
    document.getElementById('screen-cover').classList.toggle('hide');
    row = obj;
    var txt = document.getElementById('edit-text-content');
    var section = document.getElementById('edit-section-content');
    
        section.classList.remove('hide');
        txt.classList.add('hide');
}
function updateMediaUrlInput(obj){
    if(obj.checked){
        document.getElementById('media-background-container').classList.remove('hide');
    }else{
        document.getElementById('media-background-container').classList.add('hide');
    }
}
function updateListFields(){
    var val = document.getElementById("list-type-value").value;
    var links = document.getElementsByName('list-item-link');
    if (val.includes('ll')){
        links.forEach(className => {
                className.classList.remove("hide");
        });
    }
    else{
        links.forEach(className => {
                className.classList.add("hide");
        });
    }
}
function updateFormFields(){
    var val = document.getElementById("form-type-value").value;
    var custom = document.getElementById("form-input-panel");
    var email = document.getElementById("form-email");
    if (val.includes('custom')){
        custom.classList.remove("hide");
        email.classList.remove("hide");
    }
    else if (val.includes('contact')){
        custom.classList.add("hide");
        email.classList.remove("hide");
    }
    else{
        email.classList.add("hide");
        custom.classList.add("hide");
    } 
}
function previewSection(obj){
    var div = document.getElementById('section-edit');
    var m = document.getElementById('pop-up-msg');
    m.innerHTML = '<div class="subheading">Editor</div>';
    div.classList.toggle('hide');

    
    var txt = document.getElementById('edit-text-content');
    var section = document.getElementById('edit-section-content');
    
        section.classList.remove('hide');
        txt.classList.add('hide');
    


    document.getElementById('screen-cover').classList.toggle('hide');

    var action = document.getElementById('section-edit-action');
    
    if(row && action!=null){
        var content = row.parentElement;
        if(row.classList.contains('card-edit-buttons')){
            content = row.parentElement;
        }
        var color = '';
        switch (action.value){
            case 'style':
            //Get section colour
            content.parentElement.classList = ['row hide-overflow max-width primary-txt'];

            color = document.getElementById('background_colour');
            // content.parentElement.classList.forEach(className => {
            // if (className.includes('-bg')) {
            //     content.parentElement.classList.remove(className);
            // }
            // });
            //Get section background media
            if(document.getElementById('media-background-check').checked){
                var url = document.getElementById('media-url').value;
                var img = document.getElementById('background-image-url');

                row.parentElement.parentElement.children[1].children[0].src = 'assets/media/images/'+url;
            }
            else{
              content.parentElement.classList.add(color.value+'-bg');
            }
            //Get Section height
            var height = document.getElementById('height');
            content.parentElement.classList.add(height.value+'-height');
            // var oldHeight = '';
            // content.parentElement.classList.forEach(className => {
            //     if (className.includes('-height')) {
            //         content.parentElement.classList.remove(className);
            //         oldHeight = className;
            //     }
            //     });
            // height.forEach(className => {
            //     if (className.checked) {
            //         if(!className.value.includes('auto')){
            //         content.parentElement.classList.add(className.value+'-height');
            //         }
            //         else{
            //             content.parentElement.classList.add(oldHeight);
            //         }                   
            //     }
            //     });
                
            break;

            case 'clear':
                content.innerHTML = content.innerHTML.slice(0,432);
                content.parentElement.classList.forEach(className => {
                    if (className.includes('-bg')) {
                        content.parentElement.classList.remove(className);
                    }
                  });
                break;

            case 'text':
            var color = document.getElementById('font-colour');
            var string = document.getElementById('edit-long-text-input').value.replace(/(?:\r\n|\r|\n)/g, '<br>');
            var size = document.getElementById('font-size-value').value;
            var style = document.getElementById('font_style');
            style = style.value;
            var classes = color.value+'-txt '+size +' '+ style+' ';
            
            
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            var pos = document.getElementById('position');
            classes += pos.value+" ";
            var alignment = document.getElementById('alignment');
            classes += alignment.value+" ";

            content.innerHTML += "<div class='"+classes+"' onclick='editTextContent(this);'>"+string+"</div>";
            break;

            case 'button':
                var color = document.getElementById('background_colour');
                var classes = color.value+'-bg ';
                
                var style = document.getElementById('font_style').value;
                classes+= style+' ';
                color = document.getElementById('font-colour');
                classes += color.value+'-txt ';
                var text = document.getElementById('edit-short-text-input').value;
                var link = document.getElementById('edit-link-text-input').value;
                
                var pos = document.getElementById('position');
                classes += pos.value+" ";

              content.innerHTML += "<a href='"+link+"'><div class='button "+classes+"'>"+text+"</div></a>";
            break;

            case 'circle':
                var text = document.getElementById('edit-short-text-input').value.slice(0,1).toUpperCase();
                var color = document.getElementById('background_colour');
                var classes = color.value+'-bg ';
                color = document.getElementById('font-colour');
                classes += color.value+'-txt ';

            
                var float='';
                var pos = document.getElementById('position');
                classes += pos.value+" ";
                float += pos.value+" "
                
                content.innerHTML += "<div class='"+float+" extra-small-padding extra-small-square'><div class='extra-small-square  hide-overflow "+classes+" extra-small-square-line-height circle center-txt'><div class='title bold'>"+text+"</div></div></div>";
            break;

            case 'list':
            var listType = document.getElementById('list-type-value').value;
            var heading = document.getElementById('edit-short-text-input').value;;
            var items = document.getElementsByName('list-item-text');
            var links = document.getElementsByName('list-item-link');
            

            var string = '';
            var classes='';
            var style = document.getElementById('font_style').value;
                classes+= style+' ';
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            var pos = document.getElementById('position');
            classes += pos.value+" ";
            var alignment = document.getElementById('alignment');
            classes += alignment.value+" ";

            if(listType.includes('ul')){
                string += '<ul><div class="list-heading" onclick="editTextContent(this);">'+heading+'</div>';
                for (var i=0, l = items.length; i<l; i++){
                    string+='<li class="list-item" onclick="editTextContent(this);">';
                    
                    if(listType=='ull'){string+= '<a href="'+links[i].value+'">'}
                        string+= items[i].value;
                    if(listType=='ull'){string+= '</a>'}
                    
                    string+='</li>'
                }
                string +='</ul>';
            }
            else if(listType.includes('ol')){
                string += '<ol><div class="list-heading" onclick="editTextContent(this);">'+heading+'</div>';
                for (var i=0, l = items.length; i<l; i++){
                    string+='<li class="list-item" onclick="editTextContent(this);">';
                    
                    if(listType=='oll'){string+= '<a href="'+links[i].value+'">'}
                        string+= items[i].value;
                    if(listType=='oll'){string+= '</a>'}
                    
                    string+='</li>'
                }
                string +='</ol>';
            }

            content.innerHTML += "<div class='"+classes+"'>"+string+"</div>";
            break;

            case 'card':
                var color = document.getElementById('background_colour');
                var classes = color.value+'-bg ';
               
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            var pos = document.getElementById('position');
            classes += pos.value+" ";
            var height = document.getElementById('height');
            classes += height.value+"-height ";
            
            content.innerHTML += "<div class='card "+classes+" white-bg shadow small-side-padding  small-padding '><div class='max-width max-height'><div id='card-edit-container'  class='card-edit-buttons float-right'><div class='edit-button inline-block center-txt white-txt extra-small-padding cursor hide neutral-bg' onclick='editCard(this.parentElement)'>Edit</div></div></div></div>";
            break;
            case 'image':
                var classes = '';
                var url = document.getElementById('media-url').value;
                
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            var pos = document.getElementById('position');
            classes += pos.value+" ";
            var height = document.getElementById('height');
            classes += height.value+"-height ";

                    content.innerHTML += "<div class='"+classes+"'><img onclick='editImage(this)' class='max-width' src='assets/media/images/"+url+"'>";
            break;
            case 'video':
            var classes = '';
            var url = document.getElementById('media-url').value;
    
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            var pos = document.getElementById('position');
            classes += pos.value+" ";
            var height = document.getElementById('height');
            classes += height.value+"-height ";

                content.innerHTML += "<div class='"+$classes+"'><img class='max-width' src='assets/media/videos/"+$url+"'>";
            break;
            case 'form':
            var email = document.getElementById('form-email').value;
            var type = document.getElementById('form-type-value').value;
            var classes = '';
            var width = document.getElementById('width');
            classes += width.value+"-width ";
            // width.forEach(className => {
            //     if (className.checked) {
            //         classes += className.value+"-width ";
            //     }
            // });
            var pos = document.getElementById('position');
            classes += pos.value+" ";
                // pos.forEach(className => {
                //     if (className.checked) {
                //         classes += className.value+" ";
                //     }
                //     });

            var string = '<div class="small-padding '+classes+'"><form class="max-width" name="form" method="post" action="forms.php">';
            if(type=='contact'){
                string += "<div class='subheading' onclick='editTextContent(this);'>Contact us</div>";
                string += "<input class='form-input text-box extra-small-padding block border ' type='text' placeholder='What is your name?' name='form-input[]'/>";
                string += "<input class='form-input text-box extra-small-padding block border ' type='email' placeholder='What is your email?' name='form-input[]'/>";
                string += "<input class='form-input text-box extra-small-padding block border ' type='text' placeholder='What is the subject?' name='form-input[]'/>";
                string += "<textarea class='form-input text-box extra-small-padding block border ' id='edit-long-text-input' rows='15' cols='30' placeholder='What is your message?' name='form-input[]'></textarea>";
                string += "<br><input type='checkbox' name='send'/> I am a human?";
                string += "<input class='button primary-bg white-txt block center' type='submit' name='submit-form' value='Send'/>";
            }
            else if(type=='custom'){
                var heading =  document.getElementById('form-heading').value;
                string += "<div class='subheading' onclick='editTextContent(this);'>"+heading+"</div>";
                if(document.getElementsByName('text-input-label')){
                    input = document.getElementsByName('text-input-label');
                    input.forEach(className => {
                        string += "<input class='form-input text-box extra-small-padding block border ' type='text' placeholder='"+className.value+"' name='form-input'/>";
                    });
                }
                var textAreas = [];
                if(document.getElementsByName('text-area-label')){
                    textAreas = document.getElementsByName('text-area-label');
                    textAreas.forEach(className => {
                        string += "<textarea class='form-input text-box extra-small-padding block border ' id='edit-long-text-input' rows='10' cols='30' placeholder='"+className.value+"' name='form-input'></textarea>";
                    });
                }
                var submit =  document.getElementById('submit-text').value;
                string += "<input class='button primary-bg white-txt block center' type='submit' name='submit-form' value='"+submit+"'/>";
            }
            string +='<br><input type="hidden" name="sendTo" value="'+email+'"/></form></div>';
            content.innerHTML += string;
            break;
        }
    }
    row = obj;
    width = document.getElementById('width-tool');
    fontStyle = document.getElementById('font-style-tool');
    fontSize = document.getElementById('font-size-tool');
    size = document.getElementById('size-tool');
    height = document.getElementById('height-tool');
    fontColour = document.getElementById('font-colour-tool');
    backgroundColour = document.getElementById('background-colour-tool');
    shortText = document.getElementById('short-text-tool');
    longText = document.getElementById('long-text-tool');
    linkText = document.getElementById('link-text-tool');
    position = document.getElementById('position-tool');
    textAlignment = document.getElementById('text-alignment-tool');
    listType = document.getElementById('list-type-tool');
    form = document.getElementById('form-tool');
    mediaUrl = document.getElementById('media-url-tool');

    
    // fontStyle.children[0].reset();
    // fontSize.children[0].reset();
    // height.children[0].reset();
    // width.children[0].reset();
    // fontColour.children[0].reset();
    // position.children[0].reset();
    // textAlignment.children[0].reset();
    // backgroundColour.children[0].value = backgroundColour.children[0].defaultValue;
    shortText.children[0].value = '';
    longText.children[0].value = '';
    linkText.children[0].value = '';
    listType.children[0].value = '';
    // mediaUrl.children[0].reset();
    // form.children[0].reset();

    
    if(!document.getElementById('actions-cover').classList.contains('hide')){
        document.getElementById('actions-cover').classList.remove('add');
    }
}

function deleteSection(obj){
    obj.parentNode.parentNode.removeChild(obj.parentNode);
}

function changeSectionEditorActionPanel(obj){
    var action = obj.id;
    var actionOption = document.getElementById('section-edit-action');
    actionOption.value = action;
    var heading = document.getElementById("section-edit-heading");
    var panels = document.getElementsByClassName('section-tool');

    for(var i=0, l = panels.length; i<l; i++){
        if(!panels[i].classList.contains('hide')){
            panels[i].classList.add('hide');
        }
    }

    width = document.getElementById('width-tool');
    fontStyle = document.getElementById('font-style-tool');
    fontSize = document.getElementById('font-size-tool');
    size = document.getElementById('size-tool');
    height = document.getElementById('height-tool');
    fontColour = document.getElementById('font-colour-tool');
    backgroundColour = document.getElementById('background-colour-tool');
    shortText = document.getElementById('short-text-tool');
    longText = document.getElementById('long-text-tool');
    linkText = document.getElementById('link-text-tool');
    position = document.getElementById('position-tool');
    textAlignment = document.getElementById('text-alignment-tool');
    listType = document.getElementById('list-type-tool');
    form = document.getElementById('form-tool');
    mediaUrl = document.getElementById('media-url-tool');

    /*Static options*/

    

    switch (action){
        case 'style':
            height.classList.remove('hide');
            backgroundColour.classList.remove('hide');

            heading.innerHTML = "Section Style";
            mediaUrl.classList.remove('hide');
        break;
        case 'text':
            fontStyle.classList.remove('hide');
            fontSize.classList.remove('hide');
            height.classList.remove('hide');
            width.classList.remove('hide');
            fontColour.classList.remove('hide');
            position.classList.remove('hide');
            textAlignment.classList.remove('hide');
            backgroundColour.classList.remove('hide');

            heading.innerHTML = "Add Text";
            longText.classList.remove('hide');
        break;
        case 'button':
            fontStyle.classList.remove('hide');
            fontColour.classList.remove('hide');
            position.classList.remove('hide');
            backgroundColour.classList.remove('hide');

            heading.innerHTML = "Add Button";
            shortText.classList.remove('hide');
            linkText.classList.remove('hide');
        break;
        case 'circle':

            size.classList.remove('hide');
            fontColour.classList.remove('hide');
            position.classList.remove('hide');
            backgroundColour.classList.remove('hide');
            
            heading.innerHTML = "Add Profile Circle";;
            shortText.classList.remove('hide');
        break;
        case 'list':
            fontStyle.classList.remove('hide');
            fontSize.classList.remove('hide');
            height.classList.remove('hide');
            width.classList.remove('hide');
            fontColour.classList.remove('hide');
            position.classList.remove('hide');
            textAlignment.classList.remove('hide');
            backgroundColour.classList.remove('hide');
            
            heading.innerHTML = "Add List";
            listType.classList.remove('hide');
            shortText.classList.remove('hide');
        break;
        case 'card':
            height.classList.remove('hide');
            width.classList.remove('hide');
            position.classList.remove('hide');
            backgroundColour.classList.remove('hide');

            heading.innerHTML = "Add Card";
        break;
        case 'image':
            height.classList.remove('hide');
            width.classList.remove('hide');
            position.classList.remove('hide');

            heading.innerHTML = "Add Image";
            mediaUrl.classList.remove('hide');
        break;
        case 'video':
            height.classList.remove('hide');
            width.classList.remove('hide');
            position.classList.remove('hide');

            heading.innerHTML = "Add Video";
            mediaUrl.classList.remove('hide');
        break;
        case 'form':
            height.classList.remove('hide');
            width.classList.remove('hide');
            position.classList.remove('hide');
            backgroundColour.classList.remove('hide');
            fontColour.classList.remove('hide');

            heading.innerHTML = "Add Form";
            form.classList.remove('hide');
        break;
    }
}
function getEditButtons(obj){
    obj.style.display = 'none';
    obj.innerHTML = document.getElementById('editButtonHolder').innerHTML;
    obj.style.display = 'block';
}
function getCardEditButtons(obj){
    obj.style.display = 'none';
    obj.innerHTML = document.getElementById('cardEditButtonHolder').innerHTML;
    obj.style.display = 'block';
}

function addListItems(obj){
    var val = document.getElementById("list-type-value").value;
    document.getElementById('list-input-panel').innerHTML += '<br><input class="form-input text-box extra-small-padding block border " type="text" placeholder="List item text" name="list-item-text"/>';
    if (!val.includes('ll')){
        document.getElementById('list-input-panel').innerHTML += '<input class="form-input text-box tertiary-bg extra-small-padding hide block border " type="text" placeholder="List item link" name="list-item-link"/>';
    }else{
        document.getElementById('list-input-panel').innerHTML += '<input class="form-input text-box tertiary-bg extra-small-padding block border " type="text" placeholder="List item link" name="list-item-link"/>';
    }
}
function addFormItems(obj){
    var button = obj;
    
    if (button.id == 'add-short'){
        document.getElementById('form-input-fields').innerHTML += '<input class="form-input text-box extra-small-padding block border " type="text" placeholder="Short input field label" name="text-input-label"/>';
    }else if (button.id == 'add-long'){
        document.getElementById('form-input-fields').innerHTML += '<input class="form-input text-box alternative-bg extra-small-padding block border " type="text" placeholder="Long input field label" name="text-area-label"/>';
    }
}

window.addEventListener("load", function(){
    var row = document.getElementsByClassName("edit-buttons");
    var card = document.getElementsByClassName("card-edit-buttons");
    for(var i = 0, l = row.length; i<l; i++){
        getEditButtons(row[i]);}
    for(var i = 0, l = card.length; i<l; i++){
        getCardEditButtons(card[i]);}

});

function changeParentValue(obj){
    var parent = obj.parentElement.children[0];
    var value = obj.id;
    var stylesList = new Array("bold", "italic", "underline");
    var tmp = new Array();
    if (stylesList.includes(value) && (parent.value.length > 0) ){
        tmp = parent.value.split(' ');
        if(!tmp.includes(value)){
            tmp.push(value);
        }
        
        parent.value = tmp.join(" ");
    }
    else{
        parent.value = value;
    }
    
    switch (parent.id){
        case 'alignment':
                panels = document.getElementsByClassName('alignment-tool-icon');
            break;
        case 'position':
            panels = document.getElementsByClassName('position-tool-icon');
            break;
        default:
            panels = [];
            break;
    }
    if(panels.length > 0){
        for(var i=0, l = panels.length; i<l; i++){
            if(panels[i].classList.contains('tertiary-bg')){
                panels[i].classList.toggle('tertiary-bg');
            }
        }
    }
    //remove clicked button
    if(obj.classList.contains('tertiary-bg')){
        if(tmp.length > 1){
            /*the current clicked button is a font style and some font styles have alread been clicked */
            //check if value is in the list of already clicked buttons
            if(tmp.includes(value)){
                //remove value from clicked buttons list
                var i = tmp.indexOf(value);
                tmp[i] = '';
            }
            parent.value = tmp.join(' ');
        }
        else{
            parent.value = '';
        }
        
    }
    obj.classList.toggle('tertiary-bg')
}
