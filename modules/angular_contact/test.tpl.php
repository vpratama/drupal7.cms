<div id="content" role="main">
<?php
	$data = file_get_contents("php://input");
	$request = json_encode($data);
	echo $request->name;
	echo "<br />";
	echo $request->email;
	echo "<br />";
	echo $request->subject;
	echo "<br />";
	echo "<p align="justify">".$request->name."</p>";
	echo "<br />";
?>
</div>