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
 				</svg><input  placeholder="Enter State Name" name="state" id="state" style="
 				outline: 0;
 				border-style: double;
 				border-width: 0 0 2px; height: 14px;font-size: revert;margin-top: 10px;float:right;">

 			</div>
 			<button class="btn btn-success" id="sub"  style="background-color:#0d7e39;margin-top: -112px;
 			margin-left: 50px;" onclick="addState()">ADD STATE</button>
 		</div>
 		<?php 
 		$i=1;
 		foreach ($news as $state) {  ?>
 			<div class="box">
 				<div class="circle" style="text-align: left;margin-top: 20px;"><svg width="100" height="100">
 					<circle cx="40" cy="40" r="30" stroke="#0d7e39" stroke-width="2" fill="white" />
 					Sorry, your browser does not support inline SVG.
 					<text fill="#0d7e39" font-size="26" font-family="Verdana"
 					x="28" y="50"><?php echo $i;  ?></text>
 				</svg>

 			</div>
 			<h5  style="color:#0d7e39;margin-top: -72px;
 			margin-left: 50px;"><strong><?php echo $state['state'];  ?></strong>  </h5>
 		</div>

 		<?php	$i++;} ?>
 	</div>
 	<script>
 		function addState(){
 			var form_action =' <?php echo base_url(); ?>news/addstate';
 			var stat = $("#state").val();
 			
 			$.ajax({
 				url: form_action,
 				type: "POST",
 				data:{state:stat},
 				success: function (res) {
 					alert('add Success');
 					location.reload()
 				},
 				error: function (data) {
 				}
 			});
 		}
 	</script>