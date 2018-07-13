<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>PHP LibDiff - Examples</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
		<style>
			body {
				background-color: #222222!important;
			}
		</style>
	</head>
	<body>
		<h1 class="text-light border-light border-bottom mb-4">PHP LibDiff - Examples</h1>
		<?php

		// Include the diff class
		require_once dirname(__FILE__).'/lib/Diff.php';

		// Include two sample files for comparison
		$a = explode("\n", file_get_contents(dirname(__FILE__).'/a.txt'));
		$b = explode("\n", file_get_contents(dirname(__FILE__).'/b.txt'));

		// Options for generating the diff
		$options = array(
			//'ignoreWhitespace' => true,
			//'ignoreCase' => true,
		);

		// Initialize the diff class
		$diff = new Diff($a, $b, $options);

		?>
		<h2 class="text-light">Side by Side Diff</h2>
		<?php

		// Generate a side by side diff
		require_once dirname(__FILE__).'/lib/Diff/Renderer/Html/SideBySide.php';
		$renderer = new Diff_Renderer_Html_SideBySide;
		echo $diff->Render($renderer);

		?>
		<h2 class="text-light border-light border-top mt-4">Inline Diff</h2>
		<?php

		// Generate an inline diff
		require_once dirname(__FILE__).'/lib/Diff/Renderer/Html/Inline.php';
		$renderer = new Diff_Renderer_Html_Inline;
		echo $diff->render($renderer);

		?>
	</body>
</html>