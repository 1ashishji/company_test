



<div class="panel" style="background-color: white;margin-top: 100px;">
	<div class="panel-body"> 
		<div class="">
			<div class="container">
				<div class="row" style="height: 100px; background-color: white;margin-top:50px;border-radius: 5px;text-align: center; ">
					<img src="<?php echo base_url(); ?>screenshots/home.png"  style="margin-top: 30px;border-radius: 40%; float: left;margin-left: 112px;" width="20%">
				</div>
				<div class="row" style="height: 50px; background-color: white;margin-top:50px;border-radius: 5px;text-align: center; ">
					<h5 style="float: left;text-align: center;margin-left: 10px; width: 30%;margin-top: 20px; "> <strong>Name:</strong><?php echo $child['name']; ?></h5>
					<h5 style="float: left;text-align: center;margin-left: 10px; width: 30%;margin-top: 20px; "> <strong> Sex:</strong><?php echo $child['sex']; ?></h5>
					<h5 style="float: left;text-align: center;margin-left: 10px;width: 30%;margin-top: 20px;  "> <strong>Date oF Birth:</strong><?php echo $child['dob']; ?></h5>
				</div>
				<div class="row" style="height: 50px; background-color: white;margin-top:50px;border-radius: 5px;text-align: center; ">
					<h5 style="float: left;text-align: center;margin-left: 10px; width: 30%;margin-top: 20px; "> <strong>Father's Name:</strong> <?php echo $child['father']; ?></h5>
					<h5 style="float: left;text-align: center;margin-left: 10px; width: 30%;margin-top: 20px; "> <strong> Mother's Name:</strong><?php echo $child['mother']; ?></h5>
					<h5 style="float: left;text-align: center;margin-left: 10px;width: 30%;margin-top: 20px;  "> <strong>State:</strong><?php echo $child['sta']; ?></h5>
				</div>
				<div class="row" style="height: 50px; background-color: white;margin-top:50px;border-radius: 5px;text-align: center; ">
					<h5 style="float: left;text-align: center;margin-left: 10px; width: 30%;margin-top: 20px; "> <strong>District:</strong> <?php echo $child['dist']; ?></h5>
				</div>
				
			</div>
		</div>
	</div>
	<!-- end: page -->

</div>
<!-- <script src="assets/js/jquery.core.js"></script>
	<script src="assets/js/jquery.app.js"></script> -->

	<!-- Examples -->
	
<!-- <script>
  $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
</script>