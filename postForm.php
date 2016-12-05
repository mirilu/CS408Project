<?php
require_once('startPage.php');


// if the textchat is setup and it is not empty, then save the user input to 
// an html called chatlog
if (isset($_POST['textchat'])) {
    
}

if (isset($_POST['textchat'])) {
	$message = $_POST['textchat'];

	if (strpos($message, "msg") == 1) { // if it's a pm
		$words = explode(" ",$message);
		$destination = $words[1];
		$fileName = "PM_".$destination.".txt";
		$file = fopen($fileName,'a');
		$message = "[" . date("h:i:sa") . "] <i> PM from " . $_SESSION["username"] . "</i>: " . substr($message."\n",5+strlen($destination));

		fwrite($file, $message);
		fclose($file);
		header('Location:startPage.php');

		//echo $destination;
	} elseif (strpos($message, "togglePM") == 1) {
		$_SESSION["show_pms"] = !$_SESSION["show_pms"];
		header('Location:startPage.php');
	} else { // if it's a normal message
		if (trim($_POST['textchat']) != "") {
	        $_SESSION['textchat'] = stripslashes(htmlspecialchars($_POST['textchat']));
	        $fd = fopen($_SESSION['rLog'], 'a'); // saving log to a file
	        fwrite($fd, "[" . date("h:i:sa") . "] <i>" . $_SESSION["username"] . "</i>: " . $_SESSION["textchat"] . "<br>" );
	        fclose($fd);
	        header('Location:startPage.php');
	    }
	}
}

exit();
?>



