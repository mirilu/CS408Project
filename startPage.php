<!DOCTYPE html>
<?php
include('classes.php');
session_start();


$user = new User();
$_SESSION['userClass'] = $user;

//This opens up the chatlog.html file and reads in all its contents
//then displays it (echos)
function getChatlog() {
     if (file_exists("chatlog.txt") && filesize("chatlog.txt") > 0) {
        $handle = fopen("chatlog.txt", "r");
        
            while(!feof($handle)){
                $contents = fgets($handle);
                 echo $contents . '<br>' ;
            }
             fclose($handle);
    }
}

//Similar to the getChatLog method, but used to read and display
// the users online
function getUsersOnline() {
    if (file_exists("user.txt") && filesize("user.txt") > 0) {
        $handle = fopen("user.txt", "r");
        while(!feof($handle)){
                $contents = fgets($handle);
                 echo $contents . '<br>';
            }
        fclose($handle);
    }
}

/** Still working on this method to let user logout **/
if (isset($_GET['exit'])) {
    $userName = $_SESSION["username"];
    if (file_exists("user.txt") && filesize("user.txt") > 0) {
        
        
                $contents = file_get_contents("user.txt");
                $contents = str_replace($userName, "", $contents);
                file_put_contents("user.txt", $contents);
                file_put_contents("user.txt", implode('', file('user.txt', FILE_SKIP_EMPTY_LINES )));
                
            
        
    }
    $fp = fopen("chatlog.txt", 'a');
                fwrite($fp, "[" . date("m/d/Y h:i:sa") . "] <i>User <b>" .
                        $_SESSION ['username'] . "</b> has left the chat session.</i> <br>");
                fclose($fp);
                session_destroy();
                header("Location: index.php");
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

    <body onpagehide="removeUser()">
       
        <!-- This is the pop up that happens when User has not given a username  -->
        
         
        <h1><center> Welcome to the Chat Room </center></h1>
        <p class="menu">
            <a class="exit" href='startPage.php?exit=true' >logout</a>
        
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



