<?php
include '../navbars/home_navbar.php';
require_once '../inc/connection.php';


if (isset($_POST['verData']) && isset($_POST['fData']) && isset($_POST['lData']) && isset($_POST['passData']) && isset($_POST['eData'])) 
{
	$verification = $_POST['verData'];
	$firstname  = $_POST['fData'];
	$lastname  = $_POST['lData'];
	$password  = $_POST['passData'];
	$email  = $_POST['eData'];

	$encryptpass = md5($password);
	$unknown = "unknown";
	$profile = "Admin";
	//inserting data into the database
	$admin_manage_query = "INSERT INTO register VALUES('$verification','$firstname','$lastname','','$unknown','$unknown','$unknown','$encryptpass','$unknown','$email','$profile','2017-05-30 05:08:12','2017-05-30 05:08:12')";
	$admin_manage_query1 = "INSERT INTO privileges(id,add_admin,add_lecturer,delete_admin,delete_lecturer) VALUES('$verification','0','0','0','0')";

	$admin_result = $mysqli->query($admin_manage_query);
	$admin_result1 = $mysqli->query($admin_manage_query1);

}

?>
<head>
	<title>OCTPs&reg; | Manage Admin</title>
	<style type="text/css">
		h5.stud_list_title{
			font-size: 16px;
		}
		i.view{
			margin-top: -5px;
		}
		span.status{
			position: absolute;
			z-index: 9999;
			margin-left: -25px;
			border-radius: 20px;
			color:white;
			font-size: 14px;
			font-weight: 600;
			padding-right: 10px;
			padding-top: 3px;
		}
		div.template{
			border-radius:3px;
		}
		.mt10{
			margin-top: 10px;
		}
		.mb5{
			margin-bottom: 5px;
		}
		span.admin_det{
			text-transform: capitalize;
			font-weight: 500;
			font-size: 15px;
			
		}
		span.sub{
			font-weight: 500;
			font-size: 12px;

		}
	</style>
</head>
<body>
	<div class="madmin-body">
		<div class="row">
			<div class="col s2 m2 l2">
				<?php include '../navbars/sidenav.php';?>
			</div>
			<div class="col s10 m10 l10 animated fadeIn">
				<div class="admin_body">
					<div class="row">
						<div class="col s12 m8 l8 offset-m2 offset-l2">
							<h5 class="grey-text text-accent-3 left-align stud_list_title"><i class="material-icons left view">view_list</i>Admin Data Grid</h5>
							<?php 
								$select_admin_query = "SELECT * FROM register WHERE Profile = 'Admin'";
								$select_admin_fetch = $mysqli->query($select_admin_query);
								$select_admin_count = $select_admin_fetch->num_rows;

								if ($select_admin_count > 0) 
								{
									while ($admin_rows = $select_admin_fetch->fetch_array(MYSQLI_BOTH))
									{
										$firstname = $admin_rows['f_Name'];
										$lastname  = $admin_rows['l_Name'];
										$email     = $admin_rows['email'];

										$fullName  = $firstname." ".$lastname;

										$user_identifier = substr($firstname, 0,3).mt_rand();
										
									
							 ?>
							<div class="col s12 m4 l4">
								<div class="card-panel col s12 waves-effect waves-block waves-ripple template" id="<?php echo "$user_identifier";?>">
									<div class="col s12">
										<img src="../images/admin/boy.svg" class="responsive-img mt10"/>
									</div>
									<div class="col s12 ">
									<span class="admin_det text-center"><?php echo "$firstname"." "."$lastname";?></span><br>
									<span class="sub text-center"><?php echo "$email";?></span>
									</div>
								</div>
								<span class="status z-depth-1 waves-effect waves-block waves-ripple green darken-2"><i class="material-icons left">bubble_chart</i>active</span>
							</div>
							<script type="text/javascript">
								$("#<?php echo "$user_identifier";?>").on('click',function(){
									$.sweetModal({
										title:'<div class="col s12 m12 l12">\
													\			<div class="col s2 m2 l2" id="<?php echo "$lect_id";?>">\
													\				<img src="../images/boys.jpg" style="width:80px; height=80px;border:4px solid rgba(0,0,0,0.25);" class="circle responsive-img overview">\
																</div>\
													\			<div class="col s8 m8 l8">\
													\				<span class="name" style="position:absolute;top:50px;left:135px;text-transform:capitalize;"><?php echo "$fullName";?></span>\
													\				<span class="more_vert"><a href="" style="position:absolute;top:20px;right:60px;"><i class="material-icons right grey-text text-darken-2">delete</i></a><a href="" style="position:absolute;top:20px;right:100px;"><i class="material-icons right grey-text text-darken-2">archive</i></a></span>\
																<div>\
															</div>',
										content:'',
										width:'700px',

									});
								});
							</script>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Fixed floating action button for the addition of admins -->
		<div class="fixed-action-btn" style="right: 70px;bottom: 40px;">
		    <a  id="addAdmin" class="btn-floating btn-large light-blue accent-3">
		      <i class="large material-icons tooltipped" data-tooltip="Add Admins" data-position="left" data-delay="5">person_add</i>
		    </a>
		 </div>

		<!-- Modals for adding users -->
		<script type="text/javascript">
			$("#addAdmin").on('click',function(){
				$.sweetModal({
					title:'Add Other Administrators',
					content: '<form  method="post" action="" id="lectForm" style="margin-top:10px;">\
					                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">security</i>\
						                <input type="text" name="verification" class="validate" id="verification" required data-length="15">\
						                <label for="verification">Verification Name</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
						                <input type="text" name="firstname" class="validate" id="firstname" required>\
						                <label for="firstname">First Name</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">person_pin</i>\
						                <input type="text" name="lastname" class="validate" id="lastname" required>\
						                <label for="lastname">Last Name</label>\
					                </div>\
					                 <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">lock</i>\
						                <input type="password" name="password" class="validate region" id="password" required>\
						                <label for="password">Password</label>\
					                </div>\
					                <div class="input-field col s12" style="margin-top:-10px;margin-bottom:8px;">\
						                <i class="material-icons prefix" id="icon_prefix">email</i>\
						                <input type="email" name="email" id="email" class="email" required>\
						                <label for="email">Email</label>\
					                </div>\
					           </form>',
					           width:'700px',
					buttons:{
						cancelButton:{
							label:'Cancel',
							classes:'secondaryB bordered flat',
							action:function(){

							}
						},
						addButton:{
							label:'Add',
							classes:'blueB',
							action:function(){
								var verification = $('#verification').val();
								var firstname 	 = $('#firstname').val();
								var lastname 	 = $('#lastname').val();
								var password 	 = $('#password').val();
								var email 		 = $('#email').val();

								var display = $("#verification").data("length");
								console.log("Getting the length of the data");
								console.dir(display);
								var dataString = "verData="+verification +"&fData="+firstname +"&lData="+lastname +"&passData="+password +"&eData="+email;
								console.dir(dataString);
								if(verification == '' || firstname == '' || lastname == '' || password == '' || email == '')
								 {
								 	$.sweetModal({
								 		content:'All Fields Are required',
								 		icon:$.sweetModal.ICON_ERROR,
								 		width:'400px',
								 		timeout:4000
								 	});
								 }
								 else
								 {//defining a jQuery controller for the submitting of the form
									$.ajax({
										type:"POST",
										url:"manage_admin.php",
										data: dataString,
										success:function(){
											$.sweetModal({
								 				content: "Details Saved Successfully !",
								 				icon   : $.sweetModal.ICON_SUCCESS,
								 				width  :'400px',
								 				timeout: 2000
								 			});
								 			setTimeout(function() {
								 				window.location.reload();
								 			}, 2800);
										}
									});
								 }
								
							}
						}
					}
				});

				// var xtra = 0;
				// var arrayxtra = [];
				// $("#verification").keydown(function(){
				// 	xtra ++;
				// 	arrayxtra.push(xtra);
				// 	if (arrayxtra.length == 10) {
				// 		alert("Yay");
				// 	}
				// 	console.dir(arrayxtra);
					
				// });
			});

			//Trying some effects
			// $("div.template").on('click',function(){
			// 	$("div.template").css({"position":"relative","z-index":"99999","width":"200%"});
			// });
		</script>
	</div>
</body>