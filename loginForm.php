
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
$fp = fopen("user.txt", 'a');
fwrite($fp, $_SESSION['username'] . " \r\n");
fclose($fp);

// This will make another html file for whats to show on the chatbox
$fl = fopen("chatlog.txt", 'a');
fwrite($fl, '[' . date("m/d/Y h:i:sa") . '] <i>' . $_SESSION['username']
        . '</i> has joined in' . "\r\n");
fclose($fl);

//redirect back to the index page
header('Location: startPage.php');
exit();
?>

