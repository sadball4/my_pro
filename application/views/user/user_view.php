<?php
    $this->load->view('user/head_user');
?>
    <style>
        .email-signature10{background:#fff;font-family:'Roboto Condensed',sans-serif;padding:50px 20px 15px 120px;box-shadow:10px 10px 3px rgba(0,0,0,.2);overflow:hidden;position:relative}
        .email-signature10:before{content:"";background:linear-gradient(to right,#f39c12 49%,#f1c40f 50%);width:18px;height:100%;position:absolute;top:0;left:0}
        .email-signature10 .signature-img{background:#fff;width:140px;height:140px;padding:3px;border-radius:50%;border:5px solid #f1c40f;overflow:hidden;position:absolute;top:15px;left:30px;z-index:1}
        .email-signature10 .signature-img img{width:100%;height:auto;border-radius:50%}
        .email-signature10 .signature-details{color:#fff;background:#3498db;text-align:center;padding:15px 10px 15px 50px;margin-bottom:20px;border-right:15px solid #2980b9}
        .email-signature10 .title{font-size:25px;font-weight:600;text-transform:uppercase;letter-spacing:1px;margin:0}
        .email-signature10 .post{font-size:16px;font-weight:400;text-transform:uppercase;letter-spacing:1px}
        .email-signature10 .signature-content{padding:20px 10px 0 0;margin:0;list-style:none;position:relative}
        .email-signature10 .signature-content:after,.email-signature10 .signature-content:before{content:"";background:#2980b9;width:4px;height:100%;position:absolute;top:0;left:-25px}
        .email-signature10 .signature-content:after{background:#f1c40f;height:80%;top:20px;left:-35px}
        .email-signature10 .signature-content li{color:#95afc0;font-size:16px;margin:0 0 10px;display:block}
        .email-signature10 .signature-content li span{color:#f1c40f;font-size:20px;text-align:center;line-height:23px;height:23px;width:25px;margin:2px 2px 0 0}
        @media screen and (max-width:576px){.email-signature10{padding:200px 0 15px}
        .email-signature10:before{background:linear-gradient(to bottom,#f39c12 49%,#f1c40f 50%);width:100%;height:15px}
        .email-signature10 .signature-img{margin:0 auto;top:26px;left:0;right:0}
        .email-signature10 .signature-details{padding:10px;border-right:none}
        .email-signature10 .signature-content{text-align:center;padding:0}
        .email-signature10 .signature-content:after,.email-signature10 .signature-content:before{width:60%;height:4px;transform:translateX(-50%);top:-103px;left:50%}
        .email-signature10 .signature-content:after{width:45%;top:-112px}
    </style>
<body>

    <div class="container">
    <div class="container-fluid py-5">
    <div class="container">
    	<div class="row my-5 justify-content-center">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10">
                <div class="email-signature10">
                    <div class="signature-img">
                        <img src="https://www.w3schools.com/bootstrap/img_avatar4.png" alt="">
                    </div>
                    <div class="signature-details">
                        <h2 class="title"><?php echo $data_user['name'];?></h2>
                        <span class="post">Satatus : User</span>
                    </div>
                    <ul class="signature-content">
                        <li><span class="fa fa-envelope"></span> <?php echo $data_user['email'];?></li>
                        <li><span class="fas fa-calendar-check"></span> <?php echo $data_user['create_at'];?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<h2 class="text-left">Work to do </h2>
<?php if($data_work!=''){?>
<table class="table">
  <thead>
    <tr>
      <th scope="col"> # </th>
      <th scope="col">Title</th>
      <th scope="col">date_alert</th>
      <th scope="col">time_alert</th>
      <th scope="col">location</th>
    </tr>
  </thead>
  <tbody>
      <?php  
      $i = 1;
      foreach($data_work->result_array() as $row){?>
            <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $row['title'];?></td>
      <td><?php echo $row['date_alert']?></td>
      <td><?php echo $row['time_alert'];?></td>
      <td><?php echo $row['location'];?></td>
    </tr>
      <?php } ?>
  </tbody>
</table>
<?php }else { echo "No work to do";} ?>

    </div>
</body>
<?php
    $this->load->view('user/footer_user');
?>