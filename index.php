<!DOCTYPE html>

<?php
session_start();

//This opens up the chatlog.html file and reads in all its contents
//then displays it (echos)
function getChatlog() {
    if (file_exists("chatlog.html") && filesize("chatlog.html") > 0) {
        $handle = fopen("chatlog.html", "r");
        $contents = fread($handle, filesize("chatlog.html"));
        fclose($handle);
        echo $contents;
    }
}

//Similar to the getChatLog method, but used to read and display
// the users online
function getUsersOnline() {
    if (file_exists("user.html") && filesize("user.html") > 0) {
        $handle = fopen("user.html", "r");
        $contents = fread($handle, filesize("user.html"));
        fclose($handle);
        echo $contents;
    }
}

/** Still working on this method to let user logout **/
if (isset($_GET['logout'])) {
    $doc = new DOMDocument();
    $doc->loadHTML('user.html');
    $element = $doc->getElementById('userlist');
    $element->parentNode->removeChild($element);
    echo $doc->saveHTML();

    $fp = fopen("chatlog.html", 'a');
    fwrite($fp, "<div class='logout'><i>User " .
            $_SESSION ['username'] . " has left the chat session.</i><br></div>");
    fclose($fp);
    session_destroy();
}
?>

<html>
    <head>

        <title>ChatRoom</title>
        <meta charset="UTF-8">
        <script type ="text/javascript" src = "client.js"></script> 
        <link type="text/css" rel="stylesheet" href="style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    </head>

    <body>
       

        <!-- This is the pop up that happens when User has not given a username  -->
        <div id ='overlay'>
            <div id = "popup">      
                <form method = "post" name="login" action ="loginForm.php" >
                    <br><center> Must have a username: </center> 
                    <br> <center>Enter a username or leave blank and click "Enter"</center></br>
                    <center><input type="text" id = "user_input" name="username" size="40" /> <br></center>
                    <center><input type="submit" value="Enter" name="Enter" onsubmit="submitUser()"/> </center>
                </form>
            </div> 
        </div>
         
        <h1><center> Welcome to the Chat Room </center></h1>
        <p class="logout">
            <a id="exit" href="#">Exit Chat</a>
        
        <a id="msg" href="#">Send Private Msg</a>
        </p>
        <!-- This is the main div in the index.php page -->   
        <div id ="mainpage" >
            <form name = 'postForm' method='post' id = 'form' action ='postForm.php'> 
                <br>
                <input type="text" id = 'textchat' name="textchat" placeholder = "Type here" style ="width: 75vw;"/>
                <input type="submit" value="Submit" id ='submit' name='submit' onclick="submitForm();"/>
            </form>
            <!-- Where the log will be displayed -->
            <div id ="chatbox">
                <?php
                   getChatlog();  //Method to get the html file
                                    // where the logs are stored
                ?>
            </div>
            
            <!-- Where the users list will be displayed in -->
            <div id ='channellist'> 
                <center>Users Online</center> <br>
                <?php
                    getUsersOnline(); // To get the html file where
                                            // users are stored
                ?>
            </div>


        </div>
        
    </body>
</html>


<!--
        <ul class ='tab'>
            <li><a href ='javascript:void(0)' class="tablinks"
                   onclick ="client.js:open(event, 'mainpage');" id='defaultOpen'>Group Chat</a></li>
            <li><a href ='javascript:void(0)' class="tablinks" 
                   onclick ="client.js: open(event, 'private_message');">Private Message</a></li>
        </ul>
-->