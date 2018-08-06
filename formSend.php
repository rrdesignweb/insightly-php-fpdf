<?php

	include 'authentication.php';

	//--------------------------------------------------------------------//
	//Gather form input field data

  //Organisation notes capture form fields
	$orgName = (isset($_POST['orgName']) ? $_POST['orgName'] : null);
  $orgID = (isset($_POST['orgID']) ? $_POST['orgID'] : null);
  $street = (isset($_POST['street']) ? $_POST['street'] : null);
	$city = (isset($_POST['city']) ? $_POST['city'] : null);
  $state = (isset($_POST['state']) ? $_POST['state'] : null);
  $postcode = (isset($_POST['postcode']) ? $_POST['postcode'] : null);
  $country = (isset($_POST['country']) ? $_POST['country'] : null);
  $noteTitle = (isset($_POST['noteTitle']) ? $_POST['noteTitle'] : null);

  $orgInt = (int)$orgID;
  //FPDF
	require("fpdf/fpdf.php");
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('logo.jpg',10,6,30);
            // Arial bold 15
            $this->SetFont('Arial','B',16);
            // Move to the right
            $this->Cell(80);
            $this->Ln(10);
            // Title
            $this->Cell(0,10,'Header Form',0,0);
            // Line break
            $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
        }
    }

	$pdf = new PDF();
	$pdf->AddPage();
  $pdf->AliasNbPages();
	$pdf->SetFont("Arial", "B", 12);
  $pdf->Cell(0,8, "Note Title: {$noteTitle}", 0, 1);
	$pdf->Cell(0,8, "Organisation Name: {$orgName}", 0, 1);
	$pdf->Cell(0,8, "Organisation ID: {$orgID}", 0, 1);
  $pdf->Cell(0,8, "Street: {$street}", 0, 1);
  $pdf->Cell(0,8, "City: {$city}", 0, 1);
  $pdf->Cell(0,8, "State: {$state}", 0, 1);
  $pdf->Cell(0,8, "Postcode: {$postcode}", 0, 1);
  $pdf->Cell(0,8, "Country: {$country}", 0, 1);

  $pdf->Output();
	$filename="ExampleForm-$orgID-" . date("Y-m-d-H:i:s") . ".pdf";
	$doc = $pdf->Output($filename,'S');

  ///////////FIRST POST REQUEST////////////
  // $addNote = (object)array(
  //         "TITLE" => "$noteTitle",
  //         "BODY" => "<strong>Organisation Name:</strong> $orgName <br/><strong>Organisation ID:</strong> $orgID <br/><strong>Street:</strong> $street <br/><strong>City:</strong> $city <br/><strong>State:</strong> $state <br/><strong>Postcode:</strong> $postcode <br/><strong>Country: </strong>$country",
  //         "LINK_SUBJECT_ID" => "$orgID",
  //         "LINK_SUBJECT_TYPE" => "Organisation"
  // );
  // $addNote = $i->addNote($addNote);

  ///////////GET NOTE ID////////////
	//
  // $orgNotes = $i->getNotes(array("orderby" => 'DATE_CREATED_UTC'));
  // foreach ($orgNotes as $note) {
  //       $noteID = $note->NOTE_ID;
  // }
  ///////////SEND ATTACHEMENT////////////
  // $headers2 = array(
  //     "authorization: Basic XXX",
  //     "content-type: application/pdf",
  //     "cache-control: no-cache",
  //     "postman-token: XXX"
  // );

  // $target_url = "https://api.insight.ly/v2.1/Notes/?c_id=" . $noteID . "&filename=" . $filename;

  var_dump(json_decode($doc, true));
  $parameters = array(
      'FILE_ATTACHMENT' => $doc
  );

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers2);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
  curl_setopt($ch, CURLOPT_URL, $target_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_exec($ch);
  curl_close ($ch);
?>
