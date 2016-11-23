<?php

session_start();
require_once('index.php');

// If there is no username, then popup div would be visible
if (!isset($_SESSION['username'])) {
    echo '<script>javascript: changetoPop();</script>';
}

// if the textchat is setup and it is not empty, then save the user input to 
// an html called chatlog
if (isset($_POST['textchat'])) {
    if (trim($_POST['textchat']) != "") {
        $_SESSION['textchat'] = stripslashes(htmlspecialchars($_POST['textchat']));
        $fd = fopen("chatlog.html", 'a'); // saving log to an html
        fwrite($fd, "<div id='text'> [" . date("m/d/Y h:i:sa") . "] <b>" . $_SESSION["username"] . "</b>: " . $_SESSION["textchat"] . "<br> </div>");
        fclose($fd);
        header('Location:index.php');
    }
}

exit();
?>



