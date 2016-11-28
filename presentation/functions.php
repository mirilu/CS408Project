<?php
function getFileName($input) {
	if ((strpos($input,".") !== false) && (strpos($input,"/") !== false)) {
		// just to make sure people can't be cheeky with accessing other files
		return NULL;
	} else {

		return "samples/".$input.".php";
	}
}