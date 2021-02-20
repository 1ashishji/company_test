 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>

 	.box{
 		width: 25%;
 		height: 120px;
 		margin: 20px;
 		border: solid 2px green;
 		text-align: center;
 		float: left;
 		border-radius: 5px;
 		background-color: white;

 	}
 </style>
 <style>
 	h5:after {
 		content: ' \2192';
 		color:green;
 		font-size:30px;
 		font-weight: bold;
 		float: right;
 		margin-top: -15px;
 		margin-left: 15px;

 	}
 </style>

 <div class="container-fluid" style="background-color:#f0efed;height: 100%;">
 	<div class="container">
 		<div class="box">
 			<div class="circle" style="text-align: left;margin-top: 20px;"><svg width="100" height="100">
 				<circle cx="40" cy="40" r="30" stroke="#0d7e39" stroke-width="2" fill="white" />
 				Sorry, your browser does not support inline SVG.
 				<text fill="#0d7e39" font-size="26" font-family="Verdana"
 				x="28" y="50">+</text>
 			</svg>

 			<div  style="color:#0d7e39;margin-top: -92px;
 			margin-left: 0px;margin-left: 112px;">	<select name="state" id="state" style="
 			outline: 0;
 			border-style: double;
 			border-width: 0 0 2px; height: 15px; color: black;" required="">
 			<option value="">Select State Name</option>
 			<?php foreach ($news as $state) { ?>
 				<option value="<?php echo $state['id'];  ?>"><?php echo $state['state'];  ?></option>
 			<?php } ?>
 		</select></div>

 		<input  placeholder="Enter District Name" name="district" id="district" style="
 		outline: 0;
 		border-style: double;
 		border-width: 0 0 2px; height: 14px;font-size: revert;margin-top: 12px;float:right;" required="">
 	</div>
 	<button class="btn btn-success"  style="background-color:#0d7e39;margin-top: 7px;
 	margin-left: 75px;height: 30px;" onclick="adddstrict()">ADD DISTRICT</button>

 </div>


 <?php 
 $i=1;
 foreach ($district as $districts) {  ?>
 	<div class="box">
 		<div class="circle" style="text-align: left;margin-top: 20px;"><svg width="100" height="100">
 			<circle cx="40" cy="40" r="30" stroke="#0d7e39" stroke-width="2" fill="white" />
 			Sorry, your browser does not support inline SVG.
 			<text fill="#0d7e39" font-size="26" font-family="Verdana"
 			x="28" y="50"><?php echo $i;  ?></text>
 		</svg>

 	</div>
 	<div  style="color:#0d7e39;margin-top: -82px;
 	margin-left: 0px;"><strong><?php echo $districts['district'];  ?></strong>  </div>
 	<h5  style="color:#0d7e39;margin-top: 12px;
 	margin-left: 60px;"><strong><?php echo $districts['state'];  ?></strong>  </h5>
 </div>

 <?php	$i++;} ?>
</div>
<script>
	function adddstrict(){
		var form_action =' <?php echo base_url(); ?>news/adddistrict';
		var stat = $("#state").val();
		var dist = $("#district").val();
		$.ajax({
			url: form_action,
			type: "POST",
			data:{state:stat,district:dist},
			success: function (res) {
				alert('add Success');
				location.reload();
			},
			error: function (data) {
			}
		});
	}
</script>