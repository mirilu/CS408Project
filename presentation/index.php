<div id="container">
	<link rel="stylesheet" type="text/css" href="style.css">

	<div id="scriptcontents">
		Script Contents:<br><br>
		<code>
			<?php
				echo file_get_contents($_GET["script"],NULL,NULL,5);
			?>
		</code>
	</div>

	<div id="samples">
		Samples<br><br>
		<a href="./index.php?script=sample1.php">sample 1</a><br>
		<a href="./index.php?script=sample2.php">sample 2</a><br>
		<!-- more samples can just be put here-->
	</div>

	<div id="results">
		Results<br><br>
		<code>
			<?php
				include($_GET["script"]);
			?>
		</code>
	</div>
</div>