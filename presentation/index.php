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
				$fileName = getFileName($_GET["script"]);
				$contents = file_get_contents($fileName);

				$contents = str_replace("<", "&#60;", $contents);
				$contents = str_replace(">", "&#62;", $contents);

				echo nl2br($contents);
			?>
		</code>
	</div>

	<div id="samples">
		<?php
		$files = scandir("samples/");

		foreach ($files as $file) {
			if ($file != "." && $file != "..") {
				echo "<a href=\"./index.php?script="
					.explode(".php",$file)[0]
					."\">".explode(".php",$file)[0]."</a><br>";
			}
		}
		?>
		<!-- more samples can just be put here-->
	</div>

	<div id="results_header">
		<b>Results:</b>
	</div>

	<div id="results">
		<code>
			<?php
				include(getFileName($_GET["script"]));
			?>
		</code>
	</div>
</div>