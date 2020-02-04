window.addEventListener("scroll", function(){

    var target = document.getElementById('top');

    if(window.pageYOffset > 500){

     target.style.opacity = 1; 

    }

    else if(window.pageYOffset < 500){

        target.style.opacity = 0; 

    }

  },false);


  window.addEventListener('load', function(){ 
    var anchors = document.getElementsByTagName('a');
        
    for (var i = 0, l = anchors.length; i<l; i++){
        
        anchors[i].onclick = function(){
            checkId(this);
        };
    }
}, false);


function checkId(obj){
    var id = obj.hash;
    if(new String(id.slice(0,1)).valueOf() == new String("#").valueOf()){
        smoothScroll(id.slice(1));
    }
}


function scrollToTop(){

    var c = document.documentElement.scrollTop || document.body.scrollTop;

    if (c > 0) {

      window.requestAnimationFrame(scrollToTop);

      window.scrollTo(0, c - c / 8);

    }

  };

  function currentYPosition() {
    // Firefox, Chrome, Opera, Safari
    if (self.pageYOffset) return self.pageYOffset;
    // Internet Explorer 6 - standards mode
    if (document.documentElement && document.documentElement.scrollTop)
        return document.documentElement.scrollTop;
    // Internet Explorer 6, 7 and 8
    if (document.body.scrollTop) return document.body.scrollTop;
    return 0;
}


function elmYPosition(eID) {
    var elm = document.getElementById(eID);
    var y = elm.offsetTop;
    var node = elm;
    while (node.offsetParent && node.offsetParent != document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    } return y;
}


function smoothScroll(eID) {
    var startY = currentYPosition();
    var stopY = elmYPosition(eID)+document.getElementById(eID).style.height / 2 - 100;
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    if (distance < 100) {
        scrollTo(0, stopY); return;
    }
    var speed = Math.round(distance / 100);
    if (speed >= 20) speed = 20;
    var step = Math.round(distance / 25);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    if (stopY > startY) {
        for ( var i=startY; i<stopY; i+=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; if (leapY > stopY) leapY = stopY; timer++;
        } return;
    }
    for ( var i=startY; i>stopY; i-=step ) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
    }
  return false;
}
  
function scrollToId(str){
    var id = str.slice(str.indexOf('#'));
    var c = document.getElementById(id);

    c.scrollIntoView();

}


function edit_page(){

    var forms = document.getElementsByClassName("dashboard-form");

    var page = 'home';

    switch (page){

        case "home":


            for(var i = 0; i < forms.length; i++){

                if(!forms[i].classList.contains('hide')){

                    forms[i].classList.add("hide");}

                if (document.getElementById('home-page-form').classList.contains('hide')){

                document.getElementById('home-page-form').classList.remove('hide');}

            }

        break;

        case "services":


            for(var i = 0; i < forms.length; i++){

                if(!forms[i].classList.contains('hide')){

                    forms[i].classList.add("hide");}

                if (document.getElementById('services-page-form').classList.contains('hide')){

                document.getElementById('services-page-form').classList.remove('hide');}

            }

        break;

        case "about":


        for(var i = 0; i < forms.length; i++){

            if(!forms[i].classList.contains('hide')){

                forms[i].classList.add("hide");}

            if (document.getElementById('about-page-form').classList.contains('hide')){

            document.getElementById('about-page-form').classList.remove('hide');}

        }

        break;

        case "contact":

        

        for(var i = 0; i < forms.length; i++){

            if(!forms[i].classList.contains('hide')){

                forms[i].classList.add("hide");}

            if (document.getElementById('contact-page-form').classList.contains('hide')){

            document.getElementById('contact-page-form').classList.remove('hide');}

        }

        break;

        case "other":
        

        for(var i = 0; i < forms.length; i++){

            if(!forms[i].classList.contains('hide')){

                forms[i].classList.add("hide");}

            if (document.getElementById('other-content-form').classList.contains('hide')){

            document.getElementById('other-content-form').classList.remove('hide');}

        }

        break;



    }



}



function dashboardView(tab){

    var tab = tab + "-tab";

    var tabs = document.getElementsByClassName('dashboard-tabs');



    for(var i= 0; i < tabs.length; i++){

        if(tab == tabs[i].id && tabs[i].classList.contains("hide")){

            tabs[i].classList.remove("hide");

        }

        else if (tab != tabs[i].id && !tabs[i].classList.contains("hide")){

            tabs[i].classList.add("hide");

        }

    }



}

function toggleMenu(){

    var x = document.getElementById('burger');

    x.classList.toggle("change");

    if(document.getElementById('section-edit') && document.getElementById('section-edit').classList.contains('hide')){

    document.getElementById('screen-cover').classList.toggle('hide');}

    else{

        document.getElementById('screen-cover').classList.toggle('z-20');

    }

    var items = document.getElementsByClassName('nav-item');

    if (items.length >0 ){

        for(var i = 0; i< items.length; i++){

                items[i].classList.toggle('hide');

        }

    }

}



function changeColour(){

    var div = document.getElementById('color-div').style.backgroundColor = document.getElementById('color-name').value;    

}
var text_editing;
function editTextContent(obj){
    
    if(document.getElementById('actions-cover').classList.contains('hide')){
        document.getElementById('actions-cover').classList.remove('hide');
        document.getElementById('actions-options').classList.add('hide');
    }
    var text = br2nl(obj.innerHTML);
    text_editing = obj;
    var pop = document.getElementById('section-edit');
    pop.classList.toggle('hide');
    document.getElementById('screen-cover').classList.toggle('hide');

    var txt = document.getElementById('edit-text-content');
    var section = document.getElementById('edit-section-content');
    
        section.classList.add('hide');
        txt.classList.remove('hide');
    
    document.getElementById('edit-text-content').innerHTML = '<b id="section-edit-heading" class="heading">Text Editor<br><i class="book">Edit the selected text below.</i></b><div class="minute-height"></div><textarea class="form-input" onchange="changeTextContent(this.value)" rows="10">'+text+'</textarea>';
}
function nothing(){}

function changeTextContent(str){
    text_editing.innerHTML = nl2br(str);
}

function br2nl(str) {
    return str.replace(/<br\s*\/?>/mg,"\n");
}
function nl2br(str) {
    return str.replace(/\n/g, "<br />");
}

var img_to_change = '';
function editImage(obj){
    if(document.getElementById('actions-cover').classList.contains('hide')){
        document.getElementById('actions-cover').classList.remove('hide');
        document.getElementById('actions-options').classList.add('hide');
    }
    img_to_change = obj;
    var src = br2nl(obj.src).split('/');
    var name = src[src.length -1];
    var pop = document.getElementById('section-edit');
    pop.classList.toggle('hide');
    document.getElementById('screen-cover').classList.toggle('hide');
    var tmp = '<b id="section-edit-heading" class="heading">Image Editor<br><i class="book">Edit the selected image below.</i></b><div class="minute-height"></div><b>Current image: </b>'+name+'<br><br><b>New image:<select class="form-input text-box extra-small-padding block border" onChange="changeImage(this)">';
    var options = document.getElementById('media-url').getElementsByTagName('option');
    for(var i = 0, l = options.length; i<l; i++){ 
        if (options[i].value.split('/').includes(name)) {
            tmp += "<option value='" + options[i].value + "' selected>"+ options[i].value +"</option>"; 
        }
        else{
            tmp += "<option value='" + options[i].value + "'>"+ options[i].value +"</option>";
        }
    }

    tmp += '</select><div class="extra-small-height"></div>';
    var txt = document.getElementById('edit-text-content');
    var section = document.getElementById('edit-section-content');
    
        section.classList.add('hide');
        txt.classList.remove('hide');
    
    document.getElementById('edit-text-content').innerHTML = tmp;
}

function changeImage(obj){
    img_to_change.src = "assets/media/images/" + obj.value;
}