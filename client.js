/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/* global empty */

//method changetoPop: will make the main page blurry and make the login
// form pop up
function changetoPop() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('mainpage').setAttribute('class', 'is-blurred');
    login('show');
}

//this method is to change the visibility of the pop up in the CSS
function login(showhide) {
    if (showhide === "show") {
        document.getElementById('popup').style.visibility = "visible";
    } else if (showhide === "hide") {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('mainpage').setAttribute('class', 'null');
        document.getElementById('popup').style.visibility = "hidden";
    }
}
//SEND DATA TO LOGINFORM.PHP
function submitUser(){
     var username = document.getElementById("user_input").value; 
    //Submit thru AJAX
    $.ajax({
        type: "POST",
        url:"loginForm.php",
        data: username,
        cache:false
    });
    return false;
    
}

//SEND DATA TO POSTFORM.PHP
function submitForm(){
    var msg= document.getElementById("textchat").value;
    //var Enter = document.getElementById("enter").value;
    //var data = msg + Enter;
    //Submit thru AJAX
    $.ajax({
        type: "POST",
        url:"postForm.php",
        data: msg,
        cache:false
    });
    return false;
}

/**
function open(evt, Channel) {
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the link that opened the tab
    document.getElementById(Channel).style.display = "block";
    evt.currentTarget.className += " active";
}
**/


