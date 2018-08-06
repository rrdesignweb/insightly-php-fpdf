<!--<//?php
<!-- 	include 'authentication.php';
	//Get methods
	$orgs = $i->getOrganizations();
	global $organID;
	global $organName;
?>-->
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
	<style>
		body{color:gray;}
		h1{color:black;}
		ul li{padding:20px;}
	</style>

<title>PHP Insightly Tests</title>
</head>
<body>
<h1>PHP Insightly Test</h1>

			<!-- Get Contacts -->    <!-- Add Contact -->
			<form method="POST" action="test-logo.php" enctype="multipart/form-data">
				<!--<h5>Get Organisations</h5>
				<select id="target" >
				<//?php foreach ($orgs as $org) { ?>
					<?php
						//$organID = $org->ORGANISATION_ID;
						//$organName = $org->ORGANISATION_NAME;
						//$street = $org->ADDRESSES[0]->STREET;
						//$city = $org->ADDRESSES[0]->CITY;
						//$state = $org->ADDRESSES[0]->STATE;
						//$postcode = $org->ADDRESSES[0]->POSTCODE;
						//$country = $org->ADDRESSES[0]->COUNTRY;
					?>
					<option value="<//?php echo $organName ?>"><//?php echo $organName ?></option>
				<//?php }?>
				<br>
				<br>
				<script type="text/javascript">
						$("#target").on("change", function() {
						var orgName = "<//?php echo $organName ?>";
							var orgID ="<//?php echo $organID ?>";
							var orgName = "<//?php echo $organName ?>";
					        var street = "<//?php echo $street ?>";
					        var city = "<//?php echo $city ?>";
					        var state = "<//?php echo $state ?>";
					        var postcode = "<//?php echo $postcode ?>";
					        var country = "<//?php echo $country ?>";
					        $(".organisation").html(orgID + "<br>" + orgName + "<br>" + street + "<br>" + city + "<br>" + state + "<br>" + postcode + "<br>" + country);
						});
				</script>
				</select>
				<br>
				<br>
				<div class="organisation"></div> -->
				<!-- Post Contacts -->
			  <!-- <h5>Post Contact</h5>
				<label for="salutation">Salutation <input type="text" value="" name="salutation"><br>
				<label for="firstName">First Name <input type="text" value="" name="firstName"><br>
				<label for="lastName">Last Name <input type="text" value="" name="lastName"><br>
			  -->
				<!-- Add Organisation Notes -->
				<h5>Post Organisation Notes</h5 >

				<label for="noteTitle">Note Title <input type="text" value="" name="noteTitle"><br>
				<label for="noteBody">Note Body <input type="text" value="" name="noteBody"><br>
				<!-- <label for="noteBodyAppend">Note Body Append <input type="text" value="" name="noteBodyAppend"><br><br> -->
   			<!-- <label for="noteID">Note ID<input type="text" value="" name="noteID"><br><br> -->
		    <!-- <input name="file" type="file" id="file"/> -->
		    <input type="submit" value="Submit" name="btnUpload"/>
			</form><!--end form -->
</body>
</html>
