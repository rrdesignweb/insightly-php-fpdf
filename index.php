<?php
	include 'authentication.php';
	//Get methods
	$orgs = $i->getOrganizations();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<style>
	body{color:gray;}
	ul li{padding:20px;}
</style>

<title>PHP Insightly Tests</title>
</head>

<body>
<div class="col-lg-6 col-lg-offset-3" style="border:2px #ccc dotted;padding:30px">
<br>
			<!-- Get Contacts -->    <!-- Add Contact -->
			<form method="POST" action="formSend.php" enctype="multipart/form-data">

				<label for="noteTitle"><strong>Note Title:</strong></label><br><input type="text" value="" name="noteTitle"><br> <br>
				<h4>Get Organisations</h4>
				<select id="selectOrg" name="orgName">
				<?php
					foreach ($orgs as $org) {
					  $orgNameArray[] = $org->ORGANISATION_NAME;
						$orgIDArray[] = $org->ORGANISATION_ID;
	          $cityArray[] = $org->ADDRESSES[0]->CITY;
						$streetArray[] = $org->ADDRESSES[0]->STREET;
						$postcodeArray[] = $org->ADDRESSES[0]->POSTCODE;
						$countryArray[] = $org->ADDRESSES[0]->COUNTRY;
						$stateArray[] = $org->ADDRESSES[0]->STATE;
					}
				?>

				</select>

				<script type="text/javascript">
					var orgNameArr = <?php echo json_encode($orgNameArray); ?>;
					var streetArr = <?php echo json_encode($streetArray); ?>;
					var orgIDArr = <?php echo json_encode($orgIDArray); ?>;
					var cityArr = <?php echo json_encode($cityArray); ?>;
					var stateArr = <?php echo json_encode($stateArray); ?>;
					var postcodeArr = <?php echo json_encode($postcodeArray); ?>;
					var countryArr = <?php echo json_encode($countryArray); ?>;

					$.each(orgNameArr, function (i, elem) {

						$('#selectOrg').append("<option value='" + elem + "'>" + elem + "</option>");

							$('#selectOrg').on('change', function(){
								var savedIndex = $('#selectOrg').prop('selectedIndex');
								$.each(streetArr, function (e, val) {
									if(savedIndex === e){
										 $('#street').val(val);
									}
								});
								$.each(orgIDArr, function (e, val) {
									if(savedIndex === e){
										 $('#orgID').val(val);
									}
								});
								$.each(stateArr, function (e, val) {
									if(savedIndex === e){
										 $('#state').val(val);
									}
								});
								$.each(cityArr, function (e, val) {
									if(savedIndex === e){
										 $('#city').val(val);
									}
								});
								$.each(postcodeArr, function (e, val) {
									if(savedIndex === e){
										 $('#postcode').val(val);
									}
								});
								$.each(countryArr, function (e, val) {
									if(savedIndex === e){
										 $('#country').val(val);
									}
								});
							});

				});

			  </script>
				<br><br>
				<div class="container">
					<div class="row">
						<div class="col-lg-2" style="padding-left:0"><label for="orgID"><strong>Organisation ID:</strong></label><br> <input type="text" value="" name="orgID" id="orgID" readonly></div>
						<div class="col-lg-2" style="padding-left:0"><label for="street"><strong>Street Address:</strong></label><br> <input type="text" value="" name="street" id="street" readonly></div>
						<div class="col-lg-2" style="padding-left:0"><label for="street"><strong>City:</strong></label><br> <input type="text" value="" name="city" id="city" readonly></div>
					</div>
				</div>
				<br>
				<div class="container">
					<div class="row">
						<div class="col-lg-2" style="padding-left:0"><label for="street"><strong>State:</strong></label><br> <input type="text" value="" name="state" id="state" readonly></div>
						<div class="col-lg-2" style="padding-left:0"><label for="postcode"><strong>Postcode:</strong></label><br> <input type="text" value="" name="postcode" id="postcode" readonly></div>
						<div class="col-lg-2" style="padding-left:0"><label for="country"><strong>Country:</strong></label><br> <input type="text" value="" name="country" id="country" readonly></div>
					</div>
				</div>
				<br>
				<!-- Add Organisation Notes -->

				<!-- <label for="noteBody"><strong>Note Body:</strong></label><br> <input type="text" value="" name="noteBody"><br><br>  -->
				<!-- <label>Date: </label><Br>
		        <div class="col-lg-1" style="padding-left:0">
					<input id="month" name="month" type="text" class="month" value="" size="4" maxlength="2" onkeyup="" onchange="" required=""><br>
					<label for="month">MM </label>
				</div>
		        <div class="col-lg-1" style="padding-left:0">
		         	<input id="day" name="month" type="text" class="day" value="" size="4" maxlength="2" onkeyup="" onchange="" required=""><br>
					<label for="day">DD </label>
				</div>
				<div class="col-lg-1" style="padding-left:0">
					<input id="year" name="year" type="text" class="year" value="" size="6" maxlength="4" onkeyup="" onchange="" required=""><br>
					<label for="year">YYYY </label>
				</div>
				<div style="clear:both"></div>
				<br> -->

		    <input type="submit" value="Submit" name="btnUpload"/>
			</form><!--end form -->
			</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
