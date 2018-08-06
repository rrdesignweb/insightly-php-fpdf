<?php

 	  require("insightly.php");
    $i = new Insightly('api-key');
    $i->test();

    if(isset($_FILES['file']['tmp_name'])){

   	$ch = curl_init();
    $cfile = new CURLFILE($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
    $data = array();

    $data["TITLE"] = "$noteTitle";
    $data["BODY"] = "$noteBody";
    $data["LINK_SUBJECT_ID"] = "$orgID";
    $data["LINK_SUBJECT_TYPE"] = "Organisation";
    $data['FILE_ATTACHMENTS'] = $cfile;

    $localFile = $_FILES['file']['tmp_name'];
    $fp = fopen($localFile, 'r');

    $headers = array(
        "authorization: Basic XXX",
        "cache-control: no-cache",
        "content-type: multipart/form-data",
        "postman-token: XXX"
    );

    curl_setopt($ch, CURLOPT_URL, "https://api.insight.ly/v2.1/Notes");
    // curl_setopt($ch, CURLOPT_UPLOAD, 1);
    // curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
    // curl_setopt($ch, CURLOPT_INFILE, $fp);
    // curl_setopt($ch, CURLOPT_NOPROGRESS,false);
    // curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
    // curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localFile));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if ($response === true) {
        $msg = 'File uploaded successfully.';
    }
    else {
        $msg = curl_error($ch);
    }

    curl_close ($ch);
    $return = array('msg' => $msg);

    echo json_encode($return);
    // Will dump a beauty json :3
	  var_dump(json_decode($response, true));
    }
  	// $array = array();
  	// $x = 0;
  	// foreach ($individual as $person)
  	// {
  	//     $array[] = $person;
  	//     print_r($array[$x]->FIRST_NAME);
  	//     echo " ";
  	//     print_r($array[$x]->LAST_NAME);
  	//     $x++;
  	// }
  	// echo "<ul>";
  	// echo "<li>";
  	// print_r($array[0]->CONTACT_ID);
  	// echo " ";
  	// print_r($array[0]->FIRST_NAME);
  	// echo " ";
  	// print_r($array[0]->LAST_NAME);
  	// echo "</li>";

  	// echo "<li>";
  	// print_r($array[1]->CONTACT_ID);
  	// echo " ";
  	// print_r($array[1]->FIRST_NAME);
  	// echo " ";
  	// print_r($array[1]->LAST_NAME);
  	// echo "</li>";

  	// echo "<li>";
  	// print_r($array[2]->CONTACT_ID);
  	// echo " ";
  	// print_r($array[2]->FIRST_NAME);
  	// echo " ";
  	// print_r($array[2]->LAST_NAME);
  	// echo "</li>";
  	// echo "</ul>";
  	//Simple print out with loop

  	// echo "<ul>";
  	// foreach ($contacts as $contact)
  	// {
  	// 	echo "<li>";
  	//     echo "<b>Contact ID:</b> ";
  	//     echo $contact->CONTACT_ID;
  	//     echo "<br>";
  	//     echo "<b>First Name:</b> ";
  	//     echo $contact->FIRST_NAME;
  	//     echo "<Br> ";
  	//     echo "<b>Last Name:</b> ";
  	//     echo $contact->LAST_NAME;
  	//     echo "<br>";
  	//     echo "</li>";
  	// }
  	// echo "</ul>";

  	// //Add Contact
  	// //$contactID = (is_numeric($_POST['contactID']) ? (int)$_POST['contactID'] : 0);
  	// $salutation = (isset($_POST['salutation']) ? $_POST['salutation'] : null);
  	// $firstName = (isset($_POST['firstName']) ? $_POST['firstName'] : null);
  	// $lastName = (isset($_POST['lastName']) ? $_POST['lastName'] : null);

    //--------------------------------------------------------------------//
    //Structure CRM API response JSON data

    // $addContact = (object)array(
    //  "SALUTATION" => "$salutation",
    //  "FIRST_NAME" => "$firstName",
    //  "LAST_NAME" => "$lastName"
    // );

	  <input type="text" value="<?php echo htmlspecialchars($_GET['id'], ENT_QUOTES); ?>" name="contacts"><br>

		  // $addNote = (object)array(
     	"TITLE" => "$noteTitle",
  	  "BODY" => "$noteBody <br/><br/> $noteBodyAppend",
  	  "LINK_SUBJECT_ID" => "$orgID",
  	 	"LINK_SUBJECT_TYPE" => "Organisation",
  	  "FILE_ATTACHMENTS" => array(
  	  "FILE_NAME" => $filename,
  	  "URL" => "@$filedata",
  	  "CONTENT_TYPE" => "application/pdf"
	   )
  	// );
  	// $addNote = $i->addNote($addNote);

  	// $addContact = (object)array(
  	// 	"SALUTATION" => "$salutation",
  	// 	"FIRST_NAME" => "$firstName",
  	// 	"LAST_NAME" => "$lastName"
  	// );
  	// $curl = curl_init();

  	// curl_setopt_array($curl, array(
  	//   CURLOPT_URL => "https://api.insight.ly/v2.2/Contacts",
  	//   CURLOPT_RETURNTRANSFER => true,
  	//   CURLOPT_ENCODING => "",
  	//   CURLOPT_MAXREDIRS => 10,
  	//   CURLOPT_TIMEOUT => 30,
  	//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	//   CURLOPT_CUSTOMREQUEST => "PUT",
  	//   CURLOPT_POSTFIELDS => "{\n  \"CONTACT_ID\": $contactID,\n  \"SALUTATION\": \"$salutation\",\n  \"FIRST_NAME\": \"$firstName\",\n  \"LAST_NAME\": \"$lastName\"\n\n\n}",
  	//   CURLOPT_HTTPHEADER => array(
  	//     "authorization: Basic XXX",
  	//     "cache-control: no-cache",
  	//     "content-type: application/json",
  	//     "postman-token: XXX"
  	//   ),
  	// ));

  	// $response = curl_exec($curl);
  	// $err = curl_error($curl);

  	// curl_close($curl);

  	// if ($err) {
  	//   echo "cURL Error #:" . $err;
  	// } else {
  	//   echo $response;
  	// }


  	// This is the entire file that was uploaded to a temp location.

  	// if (isset($_POST['upload'])) {

  	// 	$localFile = $_FILES['image']['tmp_name'];

  	// 	$fp = fopen($localFile, 'r');
  	// 	$strFileName = "image55.jpg";
  	// 	// Connecting to website.
  	// 	$ch = curl_init();

  	// 	curl_setopt($ch, CURLOPT_USERPWD, "user:pass");
  	// 	curl_setopt($ch, CURLOPT_URL, 'ftp://' . $strFileName);
  	// 	curl_setopt($ch, CURLOPT_UPLOAD, 1);
  	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
  	// 	curl_setopt($ch, CURLOPT_INFILE, $fp);
  	// 	curl_setopt($ch, CURLOPT_NOPROGRESS, false);
  	// 	curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, 'CURL_callback');
  	// 	curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
  	// 	curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localFile));
  	// 	curl_exec ($ch);

  	// 	if (curl_errno($ch)) {

  	// 	    $msg = curl_error($ch);
  	// 	}
  	// 	else {

  	// 	    $msg = 'File uploaded successfully.';
  	// 	}

  	// 	curl_close ($ch);

  	// 	$return = array('msg' => $msg);

  	// 	echo json_encode($return);
  	// }
  	// $img = "desktop.jpg";
  	// $ch = curl_init ($img);
  	// curl_setopt($ch, CURLOPT_HEADER, 0);
  	// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	// curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
  	// $rawdata=curl_exec($ch);
  	// curl_close ($ch);
  	// if(file_exists($fullpath)){
  	//     unlink($fullpath);
  	// }
  	// $fp = fopen($fullpath,'x');
  	// fwrite($fp, $rawdata);
  	// fclose($fp);


		// Helper function courtesy of https://github.com/guzzle/guzzle/blob/3a0787217e6c0246b457e637ddd33332efea1d2a/src/Guzzle/Http/Message/PostFile.php#L90
    if(isset($_FILES['file']['tmp_name'])){

    $ch = curl_init();
    $cfile = new CURLFILE($_FILES['file']['tmp_name'], $_FILES['file']['type'], $_FILES['file']['name']);
    $data = (object)array(
    		"TITLE" => "$noteTitle",
        "BODY" => "$noteBody <br/><br/> $noteBodyAppend",
        "LINK_SUBJECT_ID" => "$orgID",
     		"LINK_SUBJECT_TYPE" => "Organisation",
    		"FILE_ATTACHMENTS[0]" => array(
    		"FILE_NAME" => $_FILES['file']['name'],
    		"CONTENT_TYPE" => $_FILES['file']['type'],
    		"URL" => $_FILES['file']['tmp_name']
		    )
	  );

    $localFile = $_FILES['file']['tmp_name'];
    $fp = fopen($localFile, 'r');

    $headers = array(
        "authorization: Basic XXX",
        "cache-control: no-cache",
        "content-type: multipart/form-data",
        "postman-token: XXX"
    );

    curl_setopt($ch, CURLOPT_URL, "https://api.insight.ly/v2.1/Notes");
    curl_setopt($ch, CURLOPT_UPLOAD, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
    curl_setopt($ch, CURLOPT_INFILE, $fp);
    curl_setopt($ch, CURLOPT_NOPROGRESS,false);
    curl_setopt($ch, CURLOPT_BUFFERSIZE, 128);
    curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localFile));
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    if ($response === true) {
        $msg = 'File uploaded successfully.';
    }
    else {
        $msg = curl_error($ch);
    }
    curl_close ($ch);
    $return = array('msg' => $msg);
    echo json_encode($return);
  }


	//NOTE: The top level key in the array is important, as some apis will insist that it is 'file'.
	// $data = (object)array(
	// 	"TITLE" => "$noteTitle",
  //  "BODY" => "$noteBody <br/><br/> $noteBodyAppend",
  //  "LINK_SUBJECT_ID" => "$orgID",
  // 	"LINK_SUBJECT_TYPE" => "Organisation",
	// 	"FILE_ATTACHMENTS[0]" => array(
	// 	"FILE_NAME" => $cfile,
	// 	"CONTENT_TYPE" => "application/pdf",
	// 	"URL" => $cfile
	// 	)
	// );

	$curl = curl_init();
	$post = array(
        "file_box" => $_FILES["file_box"]["tmp_name"],
    );
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.insight.ly/v2.1/Notes",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "{\n    \"TITLE\":\"Hello\",\n    \"BODY\": \"Hello Body\",\n    \"LINK_SUBJECT_ID\" : 70239678,\n    \"LINK_SUBJECT_TYPE\" :\"Organisation\",\n    \"FILE_ATTACHMENTS\": [\n      {\n        \"FILE_NAME\": \"file_box\",\n        \"CONTENT_TYPE\": \"application/pdf\",\n        \"URL\": \"file_box\"\n      }\n    ]\n}\n",
	  CURLOPT_HTTPHEADER => array(
	    "authorization: Basic XXX",
	    "cache-control: no-cache",
	    "content-type: application/json",
	    "postman-token: XXX"
	  )

	));
	echo $_FILES["file_box"]["tmp_name"];
	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response ;
	}

	$errmsg = '';
	if (isset($_POST['btnUpload']))
	{
		$url = "upload.php"; //
		$filename = $_FILES['file']['name'];
		$filedata = $_FILES['file']['tmp_name'];
		$filesize = $_FILES['file']['size'];

		if ($filedata != '')
		{
		// cURL headers for file uploading
	  $headers = array("Content-Type:multipart/form-data");

 		$postfields = array("filedata" => "@$filedata", "filename" => $filename);

    $ch = curl_init();
    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => 1,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_INFILESIZE => $filesize,
        CURLOPT_RETURNTRANSFER => true
    ); // cURL options
    curl_setopt_array($ch, $options);
    curl_exec($ch);
    if(!curl_errno($ch))
    {

        $info = curl_getinfo($ch);
        if ($info['http_code'] == 200)
            $errmsg = "File uploaded successfully";

    }
    else
    {

        $errmsg = curl_error($ch);
    }
    curl_close($ch);
	}
  	else
  	{
  	    $errmsg = "Please select the file";
  	}
	}
?>
