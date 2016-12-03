<!DOCTYPE html>
<?php
include('classes.php');
session_start();


$user = new User();
$_SESSION['userClass'] = $user;

 

//This opens up the chatlog.html file and reads in all its contents
//then displays it (echos)
function getChatlog() {
     if (file_exists($_SESSION['rLog']) && filesize($_SESSION['rLog']) > 0) {
        $handle = fopen($_SESSION['rLog'], "r");
        
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
    if (file_exists($_SESSION['rUSer']) && filesize($_SESSION['rUSer']) > 0) {
        $handle = fopen($_SESSION['rUSer'], "r");
        while(!feof($handle)){
                $contents = fgets($handle);
                 echo $contents . '<br>';
            }
        fclose($handle);
    }
}




function removeFromLine($fileName, $username) {
    $str = "";
    $file = file($fileName);
    foreach ($file as $line) {
        if (trim($line) != $username) {
            $str = $str.$line;
        }
    }
    $file = fopen($fileName, "w+");
    fwrite($file, $str);
    fclose($file);
}

if (isset($_GET['exit'])) {
    $userName = $_SESSION["username"];
    if (file_exists($_SESSION['rUSer']) && filesize($_SESSION['rUSer']) > 0) {
        removeFromLine($_SESSION['rUSer'],$userName);
         echo '<script> loadUsers();</script>';
             
    }
    $fp = fopen($_SESSION['rLog'], 'a');
                fwrite($fp, "[" . date("m/d/Y h:i:sa") . "] <i>User <b>" .
                        $_SESSION ['username'] . "</b> has left the chat session.</i> <br>");
                fclose($fp);
                session_destroy();
                header("Location: RoomList.php");
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
        
         
        <h1><center> Welcome to the Chat Room: <?php echo $_SESSION['rN'];?></center></h1>
        
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



