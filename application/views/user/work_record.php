<?php
    $this->load->view('user/head_user');
?>
<style>
input {
  margin: 40px 25px;
  width: 200px;
  display: block;
  border: none;
  padding: 10px 0;
  border-bottom: solid 1px #1abc9c;
  -webkit-transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  transition: all 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 96%, #1abc9c 4%);
  background-position: -200px 0;
  background-size: 200px 100%;
  background-repeat: no-repeat;
  color: #0e6252;
}

input:focus, input:valid {
 box-shadow: none;
 outline: none;
 background-position: 0 0;
}

input::-webkit-input-placeholder {
 font-family: 'roboto', sans-serif;
 -webkit-transition: all 0.3s ease-in-out;
 transition: all 0.3s ease-in-out;
}

input:focus::-webkit-input-placeholder, input:valid::-webkit-input-placeholder {
 color: #1abc9c;
 font-size: 11px;
 -webkit-transform: translateY(-20px);
 transform: translateY(-20px);
 visibility: visible !important;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<body>
<div class="container">
    <br><br>
<h2 class="text-left">Work Record</h2>
<form method="POST" action="<?php echo site_url('my_project_con/insert_work');?>">
	<div class="row">
		<input placeholder="Title" name="title" id="title" type="text" required>
        <input placeholder="Date Aleat" name="date_alert" id="date_alert" type="date" required>
        <input placeholder="Time Aleat" name="time_alert" id="time_alert" type="time" required>
        <input placeholder="Location" name="location" id="location" type="text" required>
    </div>
    <div class="row">
        <input placeholder="date_add" name="date_add" id="date_add" type="text" value="<?php echo date('Y-m-d');?>" hidden="" required>
        <input placeholder="id_user" name="id_user" id="id_user" type="text" value="<?php echo $data_work['id'];?>" hidden="" required>
    </div>
    <button class="btn primary-button">Save Work</button>
</form>
<br><br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">date_alert</th>
      <th scope="col">time_alert</th>
      <th scope="col">location</th>
      <th scope="col">Del</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
      <?php  $i = 1; $a= 1; $b = 1;
      foreach($data_show->result_array() as $row){?>
            <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row['title'];?></td>
      <td><?php echo $row['date_alert']?></td>
      <td><?php echo $row['time_alert'];?></td>
      <td><?php echo $row['location'];?></td>
      <td><a href="<?php echo site_url('my_project_con/delete/'.$row['list']);?>"><button type="button" class="btn btn-dark"><i class='fas fa-trash-alt'></i> Del</button></a></td>
      <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal<?php echo $a++;?>"><i class="fa fa-edit"></i> Edit</button></td>
          <!-- The Modal -->
      <div class="modal fade" id="myModal<?php echo $b++;?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $row['title'];?></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <form method="POST" action="<?php echo site_url('my_project_con/update_to_do');?>">
              <div class="row">
                    <input placeholder="main_list" name="main_list" id="main_list" type="text" value="<?php echo $row['list'];?>">  
                    <input placeholder="Title" name="title" id="title" type="text" value="<?php echo $row['title'];?>">
                    <input placeholder="Date Aleat" name="date_alert" id="date_alert" type="date" value="<?php echo $row['date_alert'];?>">
                    <input placeholder="Time Aleat" name="time_alert" id="time_alert" type="time" value="<?php echo $row['time_alert'];?>">
                    <input placeholder="Location" name="location" id="location" type="text" value="<?php echo $row['location'];?>">
                </div>
                <div class="row">
                </div>
                <button type="submit" class="btn primary-button">Edit Data</button>
            </form>

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      </div>
    </tr>
      <?php } ?>
  </tbody>
</table>
</body>
    <?php
    $this->load->view('user/footer_user');
    ?>

