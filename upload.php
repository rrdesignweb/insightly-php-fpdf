<?php
	if (isset($_FILES['myfile']['tmp_name'])){
	    $path = "pdf/" . $_FILES['myfile']['name'];
	    move_uploaded_file($_FILES['myfile']['tmp_name'], $path);
	}
?>