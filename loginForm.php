
<?php
//include_once ('index.php');
session_start();

//If user did not input a username, we give them a guest one
if ("" == trim($_POST['username'])) {
    $_SESSION['username'] = "guest" . rand(1, 10000);
} else { // else we set the username to user's input
    $_SESSION['username'] = stripslashes(htmlspecialchars($_POST['username']));
}
//$user->setName($_SESSION['username']);
//This will make a html file where all usernames will be saved
$fp = fopen("user.html", 'a');
fwrite($fp, "<div id='userlist'> " . $_SESSION['username'] . "<br> </div>");
fclose($fp);

// This will make another html file for whats to show on the chatbox
$fl = fopen("chatlog.html", 'a');
fwrite($fl, "<div id = 'chatlog'>[" . date("m/d/Y h:i:sa") . "] <i><b> " . $_SESSION['username']
        . "</b></i> has joined in<br></div>");
fclose($fl);
//this will then close the pop up
echo '<script>javascript: login("hide") ;</script>';

//redirect back to the index page
header('Location: index.php');
exit();
?>

