<?php

	$orgID = (is_numeric($_POST['orgID']) ? (int)$_POST['orgID'] : 0);
	$noteTitle = (isset($_POST['noteTitle']) ? $_POST['noteTitle'] : null);
	$noteBody = (isset($_POST['noteBody']) ? $_POST['noteBody'] : null);
	$noteBodyAppend = (isset($_POST['noteBodyAppend']) ? $_POST['noteBodyAppend'] : null);

?>
