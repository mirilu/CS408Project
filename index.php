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
       
            <div id = "popup">      
                <form method = "post" name="login" action ="loginForm.php" >
                    <br><center> Must have a username: </center> 
                    <br> <center>Enter a username or leave blank and click "Enter"</center></br>
                     <br> <center>Create a chatroom below</center></br>
                    <center>      Username:        <input type="text" id = "user_input" name="username" style="width: 23vw" /> <br></center>
                     <center>     Chatroom:   <input type="text" id = "create_chatroom" name="roomname" style="width: 23vw" /> <br></center>
                    <center><input type="submit" value="Enter" name="Enter" onsubmit="submitUser()"/> </center>
                </form>
                
            </div>
        
    </body>
</html>
