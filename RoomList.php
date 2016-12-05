<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

function showRooms()
{
    echo "Created Chatrooms:<br><br>";
foreach (glob("*chatlog.txt*") as $filename) {
  
    echo str_replace("chatlog.txt", "", $filename)."<br>";
    
}

}

?>
<!DOCTYPE html>
<html>
    <head>

        <title>ChatRoom</title>
        <meta charset="UTF-8">
        <script type ="text/javascript" src = "client.js"></script> 
        <link type="text/css" rel="stylesheet" href="style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    </head>


    <body>
       
        
             <div id = "RoomList">      
                <form method = "post" name="login" action ="loginForm.php" >
                    <h2><br><center> Rooms </center> 
                    <br> <center>Enter a username or leave blank</center></br>
                    <br> <center>Create or Join a chatroom below</center></br></h2>
                    <h3><?php showRooms(); ?></h3>
                   <center>Username:<input type="text" id = "user_input" name="username" style="width: 23vw" /> <br></center>
                    <center>Chatroom:<input type="text" id = "create_chatroom" name="roomname" style="width: 23vw" /> <br></center> 
                    
                    <center><input type="submit" value="Enter" name="Enter" onsubmit="submitUser()"/> </center>
                </form>
                
    </div>
    </body>
</html>
