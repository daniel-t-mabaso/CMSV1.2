function request(str, id) {

    var value = id;

    if(str == 'page'){

        value =  document.getElementById(id).value;

    }

    else if(id == 'theme'){

        var name = document.getElementById('color-selection').value;

        var color = document.getElementById('color-name').value;

        var type = document.getElementsByName('theme-type');

        for (var i = 0, length = type.length; i < length; i++)

            {

            if (type[i].checked){

                type = type[i].value;

                break;

            }

        }

        value = name+'-'+type+':'+escape(color);

    }

    else if(str == "publish-page"){

        var doc = document.getElementById('html-content');

        value += '`'+escape(doc.innerHTML);

    }

        if (window.XMLHttpRequest)
        {// Code For IE7+, Firefox, Chrome, Opera, Safari
        Xmlhttp= new XMLHttpRequest();
        }
        else
        {// Code For IE6, IE5
        Xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        
        
        Xmlhttp.onreadystatechange = Function()
        {
        if (Xmlhttp.readyState == 4 && Xmlhttp.status == 200)
        {
            popUp(Xmlhttp.ResponseText);
            alert(Xmlhttp.ResponseText);
        }
        }
        var Par = "q=" + str + "&id=" + value;
        Xmlhttp.open("POST",'assets/php/requests.php/',true);
        //xmlhttp.open("GET", "./assets/php/requests.php?q=" + str + "&id=" + value, true);
        Xmlhttp.setRequestHeader("Content-Type","Application/X-Www-Form-Urlencoded");
        Xmlhttp.send(Par);

        window.location.reload();

}





function popUp(msg){

    var div = document.getElementById('pop-up');

    var m = document.getElementById('pop-up-msg');

    m.innerHTML = msg;

    div.classList.toggle('hide');



    setTimeout(closePopUp, 10000);



}



function closePopUp(){

    var div = document.getElementById('pop-up');

    if(!div.classList.contains('hide')){

        div.classList.add('hide');

    }

}