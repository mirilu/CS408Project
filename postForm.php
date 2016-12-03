<?php
require_once('startPage.php');


// if the textchat is setup and it is not empty, then save the user input to 
// an html called chatlog
if (isset($_POST['textchat'])) {
    if (trim($_POST['textchat']) != "") {
        $_SESSION['textchat'] = stripslashes(htmlspecialchars($_POST['textchat']));
        $fd = fopen($_SESSION['rLog'], 'a'); // saving log to a file
        fwrite($fd, "[" . date("h:i:sa") . "] <i>" . $_SESSION["username"] . "</i>: " . $_SESSION["textchat"] . "<br>" );
        fclose($fd);
        header('Location:startPage.php');
    }
}

exit();
?>



