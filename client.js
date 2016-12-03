/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/* global empty */

var username;
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
    username = document.getElementById("user_input").value; 
    //Submit thru AJAX
    $.ajax({
        type: "POST",
        url:"loginForm.php",
        data: username,
        cache:false
    });
    submitChatRoom();
    loadUsers();
    return false;
    
}

function submitChatRoom(){
    roomname = document.getElementById("create_chatroom").value; 
    //Submit thru AJAX
    $.ajax({
        type: "POST",
        url:"loginForm.php",
        data: roomname,
        cache:false
    });
   
    return false;
    
}




//SEND DATA TO POSTFORM.PHP
function submitForm(){
    var msg= document.getElementById("textchat").value;
    var data1 = msg + username;
    //var data = msg + Enter;
    //Submit thru AJAX
    $.ajax({
        type: "POST",
        url:"postForm.php",
        data: data1,
        cache:false
    });
    loadlog()
    return false;
}

function removeUser(){
    var remove = document.getElementById("exit");
    $.ajax({
        type: "GET",
        url: 'startPage.php',
        data: remove,
        cache: false 
    });
    loadUsers()
    return false
}

function loadLog(){    
    
    var v = document.getElementById("create_chatroom").value; 
    $.ajax({
        url: v.concat("chatlog.txt"),
        cache: false,
        success: function(data){       
            
            $("#chatbox").html(data);
            //Auto-scroll          
            document.getElementById('chatbox').scrollTop = document.getElementById('chatbox').scrollHeight;        
        }   
    });
}


function loadUsers(){
    
    var vv = document.getElementById("create_chatroom").value; 
    $.ajax({
        url: vv.concat("user.txt"),
        cache: false,
        success: function(data){  
            var lines = data.split('\r\n'),
           htmlLines = lines.join('<br>') + '<br>';
              $('#channellist').html(htmlLines);
              						  
            //Auto-scroll          
          document.getElementById('channellist').scrollTop = document.getElementById('channellist').scrollHeight;        
        }   
    });
}

setInterval(loadUsers, 2500);
setInterval (loadLog, 2500);




