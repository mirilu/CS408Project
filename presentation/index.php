<div id="container">
	<link rel="stylesheet" type="text/css" href="style.css">

	<div id="contents_header">
		<b>
			Script Contents:
		</b>
	</div>

	<div id="samples_header">
		<b>
			Samples:
		</b>
	</div>

	<div id="scriptcontents">
		<code>
			<?php
				include("functions.php");
				echo nl2br(file_get_contents(getFileName($_GET["script"]),NULL,NULL,5));
			?>
		</code>
	</div>

	<div id="samples">
		<a href="./index.php?script=1">sample 1</a><br>
		<a href="./index.php?script=2">sample 2</a><br>
		<!-- more samples can just be put here-->
	</div>

	<div id="results">
		
		<b>Results</b><br><br>
		<code>
			<?php
				include(getFileName($_GET["script"]));
			?>
		</code>
	</div>
</div>