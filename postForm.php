<?php
require_once('startPage.php');


// if the textchat is setup and it is not empty, then save the user input to 
// an html called chatlog
if (isset($_POST['textchat'])) {
    if (trim($_POST['textchat']) != "") {
        $_SESSION['textchat'] = stripslashes(htmlspecialchars($_POST['textchat']));
        $fd = fopen("chatlog.txt", 'a'); // saving log to a file
        fwrite($fd, "[" . date("m/d/Y h:i:sa") . "] " . $_SESSION["username"] . ": " . $_SESSION["textchat"] . "\n" );
        fclose($fd);
        header('Location:startPage.php');
    }
}

exit();
?>



