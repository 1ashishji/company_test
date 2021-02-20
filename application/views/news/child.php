 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>s
<style type="text/css">
	.pagination>li {
		display: inline;
		padding:0px !important;
		margin:0px !important;
		border:none !important;
	}
	.modal-backdrop {
		z-index: -1 !important;
	}
/*
Fix to show in full screen demo
*/
iframe
{
	height:700px !important;
}

.btn {
	display: inline-block;
	padding: 6px 12px !important;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	-ms-touch-action: manipulation;
	touch-action: manipulation;
	cursor: pointer;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
}

.btn-primary {
	color: #fff !important;
	background: #428bca !important;
	border-color: #357ebd !important;
	box-shadow:none !important;
}
.btn-danger {
	color: #fff !important;
	background: #d9534f !important;
	border-color: #d9534f !important;
	box-shadow:none !important;
}

.custom-file-upload input[type="file"] {
	display: none;
}
.custom-file-upload .custom-file-upload1 {
	border: 1px solid green;
	color: green;
	display: inline-block;
	padding: 6px 12px;
	cursor: pointer;
	border-radius: 5px;
	width: 600px;
	text-align: center;
}
</style>
<script>
	function getChild(id){
		var base_url = '<?php 	echo base_url(); ?>';
		$.ajax({
			url: base_url+"news/getchild/id/"+id,
			context: document.body,
			success: function(responseText){
				$("#con-close-modal").html(responseText);
				$("#con-close-modal").find("script").each(function(i){
					eval($(this).text());
				});
			}
		});
	}
</script>

</script>
<body>
	<div class="container-fluid" style="background-color:#f0efed;height: 100%;">
		<div class="row">

		</div>

		<div class="row">
			<div class="col-md-1 center">
				
			</div>
			<div class="col-md-10 ">
				<h2 class="text-center"><button class="btn btn-outline-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" style="background-color: green;color: white; font-size: 10px; border-radius: 4px;float: right;margin: 10px;">ADD CHILD</button></h2>
				<table id="datatable" class="table table-striped " cellspacing="0" width="100%"style="background-color:white;height: 100%;" >
					<thead>
						<tr>
							<th>Name</th>
							<th>Sex</th>
							<th>Date Of Birth</th>
							<th>Father's Name</th>
							<th>Mother's Name</th>
							<th>State</th>
							<th>District</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($child as $childs) { ?>
							<tr>
								<td><?php echo $childs['name']; ?></td>
								<td><?php echo $childs['sex']; ?></td>
								<td><?php echo $childs['dob']; ?></td>
								<td><?php echo $childs['father']; ?></td>
								<td><?php echo $childs['mother']; ?></td>
								<td><?php echo $childs['sta']; ?></td>
								<td><?php echo $childs['dist']; ?></td>
								<td>
									<a  href="javascript:void(0)"   id="get-finalize-order" data-toggle="modal" data-target="#con-close-modal" class="iframe" onclick="getChild('<?php echo $childs['id']; ?>');" title="View child"style="border: solid 2px green;color: green; font-size: 16px; border-radius: 4px;"><span >View</span></a> </td>

								</tr>
							<?php	} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title text-center" style="color:green;" id="Heading">ADD CHILD</h4>
					</div>
					<div class="modal-body">
						<form action="addchild" id="data" method="post" name="form" enctype="multipart/form-data">
							<div class="form-group">
								<input class="form-control " type="text" placeholder="Name" name="name">
							</div>
							<div class="form-group">
								<select name="sex" id="sex" class="form-control ">
									<option value="">Sex</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<input  type="Date" placeholder="Date Of Birth" class="form-control " name="dob" style="
								outline: 0;
								border-style: double;
								border-width: 0 0 2px;">
							</div>
							<div class="form-group">
								<input class="form-control " type="text" placeholder="Father's Name" name="father" style="
								outline: 0;
								border-style: double;
								border-width: 0 0 2px;">
							</div>
							<div class="form-group">
								<input class="form-control " type="text" placeholder="Mother's Name" name ="mother"style="
								outline: 0;
								border-style: double;
								border-width: 0 0 2px;">
							</div>
							<div class="form-group">
								<select name="State" id="sex" class="form-control " style="
								outline: 0;
								border-style: double;
								border-width: 0 0 2px;">
								<option value="">State</option>
								<?php foreach ($state as $states) { ?>
									<option value="<?php echo $states['id'];  ?>"><?php echo $states['state'];  ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<select name="district" id="sex" class="form-control " style="
							outline: 0;
							border-style: double;
							border-width: 0 0 2px;">
							<option value="">District</option>
							<?php foreach ($district as $dist) { ?>
								<option value="<?php echo $dist['id'];  ?>"><?php echo $dist['district'];  ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="custom-file-upload">
						<label for="file-upload" class="custom-file-upload1">
							Take A Photo/Upload
						</label>
						<input id="file-upload" name="file" type="file"/>
					</div>
					<div class="modal-footer ">
						<button type="submit" class="btn btn-success btn-lg" style="width: 100%;">SUBMIT</button>
					</div>
				</form>
			</div>
			
		</div>
		<!-- /.modal-content --> 
	</div>
</div>
<!-- /.modal-dialog --> 

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;"></div>
</body>
<script>
	$("form#data").submit(function(e) {
		e.preventDefault();    
		var form_action =' <?php echo base_url(); ?>news/addchild';
		var formData = new FormData(this);
		$.ajax({
			url: form_action,
			type: 'POST',
			data: formData,
			success: function (data) {
				alert('Success Fully Add Cild');
				location.reload();
			},
			contentType: false,
			processData: false
		});
	});
</script>