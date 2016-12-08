<!DOCTYPE html>
<html>
<head>

<?php $this->load->helper('url'); ?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/facebook.css'; ?>">
	<script type="text/javascript" src="<?php echo base_url().'js/jquery-2.2.3.min.js';?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'js/bootstrap.min.js';?>"></script>
	
	<title></title>
	<script>
		$(document).ready(function(){
			

			$('#feed').click(function(){

				//////////uplaod photo\\\\\\\\\\\\\\
				var s=$("#session").val();
				var photo=$("#pic").val();
				console.log(photo);
				alert(s);
				alert(photo);
				console.log(s);
				$("#news").hide();
				$("#pic_upload").removeClass('hide_pic_upload');
				});

			/////////////////update status\\\\\\\\\\\\\\\
			$('#post').click(function(){

				var s=$("#session").val();
				var status=$("#area").val();
				var name=$("#name_session").val();
				var file=$("#file_session").val();
				alert(s);
				alert(status);
				alert(name);
				alert(file);
				console.log(status);
				console.log(s);
				 if(status.length<140)
				 {
				 	$.ajax({
				 		type:"POST",
				 		url:'http://localhost/webservice_scv/index.php/newsfeedC/UpdateStatus',
						data:{user_id:s,status:status,firstname:name,file:file},
				 		dataType:"json",
				 	success:function(data)
				 	{
				 		console.log(data);
				 	}
				 	});
				 }


			});
			/////////////////un frnd\\\\\\\\\\\\\\\\
			function Unfriend(fid)
			{
				$("#"+fid).click(function(){

					var s=$("#session").val();
					alert(fid);
					alert(s);
					$("#news").hide();

					$.ajax({
						type:"POST",
						url:'http://localhost/webservice_scv/index.php/FriendC/UnFriend',
						data:{sender:s,receiver:fid},
						dataType:"json",
						});

					});
				}
				//////////////////view frnd\\\\\\\\\\\\\\\
				$("#srch").click(function(){

						var s=$("#session").val();
						alert(s);
						$("#news").hide();

						$.ajax({
					type:"POST",
					url:'http://localhost/webservice_scv/index.php/FriendC/ViewFriend',
					data:{receiver:s},
					dataType:"json",

					success:function(data)
					{
						alert(data);
						console.log(data);
						var txt="";
	     				for (var i = 0; i < data.length; i++)
	     					{
	     						txt+="<div class='col-md-12 col-xs-12' style='margin:2%;'><div class='col-md-2 col-xs-2'><img src='http://localhost/fbsyama2/images/"+data[i].vchr_user_profilepicture+"'style='width:50px;height=30px;'></div><div class='col-md-2 col-xs-1'>"+data[i].vchr_user_fname+"</div><div class='col-md-2 col-xs-2'>"+data[i].vchr_user_lname+"</div><div class='col-md-3 col-xs-4'><Button type='button' id="+data[i].pk_int_user_id+">UnFriend</Button></div>";
	     						fid=data[i].pk_int_user_id
	     					}
	     					$("#frnd").append(txt).removeClass('hidden');
	     					Unfriend(fid);
	     					console.log(uid);
					}

				});

				});
			/////////////////confirm frnd\\\\\\\\\\\\\\\\\\\
			function Confirmfriend(uid,email)
			{
				
				$("#"+uid).click(function(){

					 var s=$("#session").val();
					 alert(uid);
					 alert(email);
					 alert(s);
					$("#news").hide();
					$.ajax({
				type:"POST",
				url:'http://localhost/webservice_scv/index.php/FriendC/ConfirmRequest',
				data:{sender:uid,receiver:s,emailid:email},
				dataType:"json",

					});
			});	

			}
			/////////////////view reqst\\\\\\\\\\\\\\\
		$("#bttn").click(function(){
			var s=$("#session").val();
			$("#news").hide();
			$.ajax({
				type:"POST",
				url:'http://localhost/webservice_scv/index.php/FriendC/views',
				data:{receiver:s},
				dataType:"json",
				
				success: function (data)
				{
	     			//alert(data);
	     			//console.log(data);
	     			var txt="";
	     			console.log(data);
	     			for (var i = 0; i < data.length; i++)
	     			{	
	     				txt +="<div class='col-md-12 col-xs-12' style='margin:2%;'><div class='col-md-2 col-xs-2'><img src='http://localhost/fbsyama2/images/"+data[i].vchr_user_profilepicture+"'style='width:50px;height=30px;'></div><div class='col-md-3 col-xs-1'>"+data[i].vchr_user_fname+"  "+data[i].vchr_user_lname+"</div><div class='col-md-2 col-xs-2'><button id='"+data[i].pk_int_user_id+"'>Confirm</button></div><div class='col-md-3 col-xs-3'><button>DeleteRequest</button></div></div>"
	     				uid=data[i].pk_int_user_id;
	     				console.log(uid);
	     				email=data[i].vchr_user_email;
	     			
	     			}
					//alert(txt);
	     			$("#apprv").append(txt).removeClass('hidden');
	     			Confirmfriend(uid,email);
	     			console.log(uid);
				}
				
			});
			//console.log(s);
		});
			////////////////frnd rqst\\\\\\\\\\\\\\\\\\\\\
			function sendrequest(uid)
			{
				
				$("#"+uid).click(function(){

					 var s=$("#session").val();
					 $("#news").hide();
					$.ajax({
				type:"POST",
				url:'http://localhost/webservice_scv/index.php/FriendC/FriendRequest',
				data:{sender:s,receiver:uid},
				dataType:"json",

					});
			});	

			}
			////////////////////search frnd\\\\\\\\\\\\\\\\\\\
    		$("#button").click(function(){
    			var s=$("#sss").val();
    			$("#news").hide();

    			$.ajax({
	    type: "POST",
	    url: 'http://localhost/webservice_scv/index.php/FriendC/search',
	    data:  {fname:s},
	    dataType: "json",
	     success: function (data)
	     {
	     	var txt="";
	     	for (var i = 0; i < data.length; i++)
	     	{
	     		txt +="<div class='col-md-12 col-xs-12' style='margin:2%;'><div class='col-md-2 col-xs-2'><img src='http://localhost/fbsyama2/images/"+data[i].vchr_user_profilepicture+"'style='width:50px;height=30px;'></div><div class='col-md-2 col-xs-1'>"+data[i].vchr_user_fname+"</div><div class='col-md-2 col-xs-2'>"+data[i].vchr_user_lname+"</div><div class='col-md-3 col-xs-4'><Button type='button' id="+data[i].pk_int_user_id+">Add friend</Button></div>";
	     			uid=data[i].pk_int_user_id;
	     			
	     	}
	     	// console.log(txt);


	 			$("#view").append(txt).removeClass("hidden");
	 			sendrequest(uid);
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
		    alert('error: ' + textStatus + ':' + errorThrown);
		}
	});
    		});
    	});

    	
	</script>
</head>
<body>
	<input type="text" id="session" value="<?php echo $this->session->userdata('id'); ?>" >
	<input type="" value="<?php echo $this->session->userdata('profilepicture'); ?>" name="" id='profile_session'>
	<input type="" value="<?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?>" name="" id='name_session'>
	

	<div class="container_fluid">
	<div>
	<?php
	$this->load->library('session');
	//echo $this->session->userdata('id');

	?>
		
	</div>
		<div class="row fb_head">
			<div class="col-md-offset-1 col-xs-offset-1 col-md-3 col-xs-3">
				<input type="text" name="" placeholder="search facebook" class="form-control" id="sss">
			</div>
			<div class="col-md-1 col-xs-1">
				<input type="text" name="" value="Search" class="form-control margin button_head" id="button">
		</div>
			<div class=" col-md-offset-2 col-xs-offset-2 col-md-3 col-xs-3">
		<ul class="list-inline">
			<li><img src="<?php echo base_url().'images/'?><?php echo $profilepicture;?>" class="image-responsive image"></li>
			<li><a class="white"><?php echo $fname, " ",$lname; ?></a></li>
				</ul>
				
		</div>
		</div>
		<!-- <div class="col-md-1">
			<label class="white"><?php echo $fname," ",$lname ?></label>
		</div> -->
		<div class="row second_div">
			<div class="col-md-3 col-xs-3">
				<ul class="list-inline">
					<li><img src="<?php echo base_url().'images/'?><?php echo $profilepicture;?>" class="image-responsive image"></li>
					<li><a><?php echo $fname, " ",$lname ?></a></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/edit.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="Edit profile" style="background-color: lightgrey; border:0px;"></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/edit.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="Approve friend" id="bttn" style="background-color: lightgrey; border:0px;"></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/edit.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="Search friends" id="srch" style="background-color: lightgrey; border:0px;"></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/photo.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="Photo upload" id="feed" style="background-color: lightgrey; border:0px;"></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/write.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="Status update" id="status" style="background-color:lightgrey; border:0px;" ></li>
				</ul>
				<ul class="list-inline">
						<li><img src="<?php echo base_url().'images/write.png'?>" class="image-responsive image"></li>
						<li><input type="button" name="" value="News feed" id="fead" style="background-color:lightgrey; border:0px;" ></li>
				</ul>
			</div>
			<div class="col-md-6 col-xs-6">
				<div class="col-md-12 news_fead per_1 hidden" id="view">a</div>
				<div class="col-md-12 news_fead per_1 hidden" id="apprv">b</div>
				<div class="col-md-12 news_fead per_1 hidden" id="frnd">c</div>
				


				<form name="" action="<?php echo base_url().'index.php/newsfeed/picture'; ?>" method="POST" enctype="multipart/form-data">
				<div class="col-md-12 news_fead per_1 hide_pic_upload" id="pic_upload">
					<input type="file" name="show">
					<input type="submit" name="" value="post" id="img" style="margin-bottom:10px; background-color:#3b5998; color:white;">
				</div>
				</form>
			<div class="col-md-12 news_fead per_1" id="news">
					<div class="col-md-4 col-xs-4">
						<img src="<?php echo base_url().'images/edit.png'?>" class="width"><a>Update Status</a>
					</div>
					<div class="col-md-4 col-xs-4">
						<img src="<?php echo base_url().'images/photo.png'?>" class="width"><a>Add Photos/Video</a>
					</div>
					<div class="col-md-4 ">
						<img src="<?php echo base_url().'images/write.png'?>" class="width"><a>Write Notes </a> 
					</div>
					<br>
					<hr>
					<div class="col-md-2 col-xs-2">
						<img src="<?php echo base_url().'images/'?><?php echo $profilepicture;?>" class="image-responsive image">
					</div>
						<div class="col-md-10 col-xs-10">
							<textarea rows="5" cols="45" placeholder="What's on your mind?" id="area"></textarea>
						</div>
						<div class="col-md-12 col-xs-12">
							<hr>
						</div>
						<div class="col-md-3 col-md-offset-9 col-xs-offset-9">
							<input type="submit" name="" value="post" id="post" style="margin-bottom:10px; background-color:#3b5998; color:white;">
						</div>
				</div>
				<div class="col-md-12 news_fead per_1">
				</div>
			</div>
			<div class="col-md-2 offset-4 col-md-10">
				<a>YOUR ADS</a>
			</div>
		</div>

	</div>
</body>
</html>