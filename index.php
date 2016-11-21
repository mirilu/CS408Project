<!DOCTYPE html>

<?php
function getChatlog(){
    if (file_exists("chatlog.html") && filesize("chatlog.html") > 0) {
                    $handle = fopen("chatlog.html", "r");
                    $contents = fread($handle, filesize("chatlog.html"));
                    fclose($handle);
                    echo $contents;
                }
}

if (isset($_GET['logout'])) {
    $doc = new DOMDocument();
    $doc->loadHTML('user.html');
    $element = $doc->getElementById('userlist');
    $element->parentNode->removeChild($element);
    echo $doc->saveHTML();

    $fp = fopen("chatlog.html", 'a');
    fwrite($fp, "<div class='logout'><i>User " . $_SESSION ['username'] . " has left the chat session.</i><br></div>");
    fclose($fp);
    session_destroy();
}

 if(isset($_POST['Enter'])){
        if("" == trim($_POST['username'])){
            $_SESSION['username'] = "guest". rand(1,10000);  
         }
        else{
            $_SESSION['username'] = stripslashes(htmlspecialchars($_POST['username']));
        }
        $fp = fopen("user.html", 'a');
        fwrite($fp, "<div id='userlist'> ". $_SESSION["username"] . "<br> </div>");
        fclose($fp);
            
        $fl = fopen("chatlog.html", 'a');
        fwrite($fl, "<div id = 'chatlog'>[". date("m/d/Y h:i:sa"). "] <i> " . $_SESSION["username"]
                . "</i> has joined in<br></div>" );
        fclose($fl);
        echo '<script>javascript: login("hide") ;</script>';   
        }
    
?>


<html>
    <head>
        <title>ChatRoom</title>
        <meta charset="UTF-8">
        <script src="jsScripts.js"></script>
        <link type="text/css" rel="stylesheet" href="style.css" />
    </head>

    <body>

        <!-- This is the pop up that happens when User has not given a username -->
        <div id ='overlay'>


            <div id = "popup">      
                <form method = "post" name="login">
                    <br><center> Must have a username: </center> 
                    <br> <center>Enter a username or leave blank and click "Enter"</center></br>
                    <center><input type="text" id = "user_input" name="username" size="40" /> <br></center>
                    <center><input type="submit" value="Enter" name="Enter"/> </center>
                </form>
            </div> 
        </div>

        <h1><center> Welcome to the Chat Room </center></h1>
        <p class="logout">
            <a id="exit" href="#">Logout</a>
        </p>

        <div id ="mainpage">
            <form name = 'postForm' action = "postForm.php" method="post" id = 'form' onsubmit="validateMsg();"> 
                <br>
                <input type="text" id = 'textchat' name="textchat" placeholder = "Type here" style ="width: 75vw;"/>
                <input type="submit" value="Submit" id ='submit' name="submit" />
            </form>

            <div id ="chatbox">
                <?php
                    getChatlog();
                ?>
            </div>
            
            <div id ='channellist'> 
                <center>Users</center> <br>
                <?php
                if (file_exists("user.html") && filesize("user.html") > 0) {
                    $handle = fopen("user.html", "r");
                    $contents = fread($handle, filesize("user.html"));
                    fclose($handle);
                    echo $contents;
                }
                ?>
            </div>
            
            <form action = "postForm.php" method="post" id = 'form' name = 'postForm' onsubmit="validateMsg();"> 
                <br>
                <input type="text" id = 'textchat' name="textchat" placeholder = "Type here" style ="width: 75vw;"/>
                <input type="submit" value="Submit" id ='submit' name="submit" />
            </form>
        </div>
    </body>
</html>


