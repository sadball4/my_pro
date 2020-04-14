<?php
	$this->load->view('head'); 
?>
<style>
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('<?php echo base_url('image/bg_login.jpg')?>');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo site_url('my_project_con/register');?>">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user-circle"></i></span>
						</div>
						<input name="name" id="name" type="text" class="form-control" placeholder="Please fill in your first and last name">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class='fas fa-mail-bulk'></i></span>
						</div>
						<input name="email" id="email" type="email" class="form-control" placeholder="Please enter email.">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-picture-o"></i></span>
						</div>
						<input name="picture" id="picture" type="file" class="form-control">
					</div>
					<div class="row align-items-center remember">
						Login information
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user-plus"></i></span>
						</div>
						<input name="username" id="username" type="text" class="form-control" placeholder="Please enter username">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="material-icons">vpn_key</i></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Please enter password">
					</div>
					<div class="input-group form-group" hidden=''>
						<div class="input-group-prepend">
							<span class="input-group-text"><i class='fas fa-calendar-plus'></i></span>
						</div>
						<input name="create_at" id="create_at" type="text" class="form-control" value="<?php echo date('Y-m-d');?>">
					</div>
					<div class="form-group">
						<input type="submit" value="register" class="btn float-right login_btn">
						<a href="<?php echo site_url('welcome');?>"><input type="button" value="Black" class="btn float-left login_btn"></a>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
</body>
</html>