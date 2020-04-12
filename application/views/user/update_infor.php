<?php
    $this->load->view('user/head_user');
?>
<body>
<div class="container">
<br><br>
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <form method="POST" action="<?php echo site_url('my_project_con/updatesave');?>"> 
            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div class="bg-dark text-white text-center py-2">
                        <h3><i class="fa fa-user"></i> Chang Personal Information</h3>
                        <p class="m-0">Username : <?php echo $data_user_update['username'];?></p>
                        <input type="text" class="form-control" id="main_id" name="main_id" value="<?php echo $data_user_update['id'];?>" hidden="">
                    </div>
                </div>
                <div class="card-body p-3">
                <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-user text-dark"></i>
                                </div>
                            </div>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $data_user_update['name'];?>" placeholder="Nombre y Apellido" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-envelope text-dark"></i>
                            </div>
                            </div>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $data_user_update['email'];?>" placeholder="ejemplo@gmail.com" required>
                        </div>
                    </div>
                    <div class="text-center">
                            <input type="submit" value="Edit" class="btn btn-dark btn-block rounded-0 py-2">
                    </div>
                    </div>

            </div>
        </form>
    </div>
    <div class="col-2"></div>
</div>
    
</div>
</body>
<?php
    $this->load->view('user/footer_user');
?>