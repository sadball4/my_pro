<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Welcome to CodeIgniter</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap-grid.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap-grid.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap-reboot.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap-reboot.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.js');?>">
    <script src="<?php echo base_url('bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">My Project LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('my_project_con/login_view');?>"> Home Page </a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('my_project_con/add_work');?>"> Work record </a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('my_project_con/update_infor');?>"> Change personal information</a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('my_project_con/update_pass');?>"> Change password </a></li>

<li class="nav-item"><a class="btn ml-2 btn-warning" href="<?php echo site_url('my_project_con/logout');?>">Logout</a></li>
    </ul>
  </div>
</nav>