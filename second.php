<?php

	include 'authentication.php';
	$orgNotes = $i->getNotes(array("top" => 1));
    global $orgID;
    global $noteID;


    foreach ($orgNotes as $note) {        
          $noteID = $note->NOTE_ID; 
          $orgID = $note->NOTELINKS[0]->ORGANISATION_ID;
    }


?>