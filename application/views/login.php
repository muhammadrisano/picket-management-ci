<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?=base_url().'assets/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?=base_url().'assets/datatables/css/dataTables.bootstrap.min.css';?>" rel="stylesheet">
    <link href="<?=base_url().'assets/datatables/css/jquery.dataTables.min.css';?>" rel="stylesheet">
    <link href="<?=base_url().'assets/css/main.css';?>" rel="stylesheet">
    <link href="<?=base_url().'assets/css/inid.css';?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <div class="container">
    <div class="kotak">
      <h1><b>SELAMAT DATANG</b></h1>
      <h3>Sistem Informasi Absensi Siswa <br/> SMAN 4 Padang</h3>
      <p id="pesan"><?php echo $this->session->flashdata('pesanlogin');?></p>
      <form method="POST" action="<?=site_url('/piket/login');?>">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">

      </div>
      <br/>
      <button type="submit" name="btn_submit" class="btn btn-primary btn-block btn-lg" value="submit"><i class="glyphicon glyphicon-user" ></i> Login</button>

      </form>

    </div>
    



    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url().'assets/jquery/jquery-3.3.1.min.js';?>"></script>
    <script src="<?=base_url().'assets/datatables/js/dataTables.bootstrap.min.js';?>"></script>
    <script src="<?=base_url().'assets/datatables/js/jquery.dataTables.min.js';?>"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url().'assets/bootstrap/js/bootstrap.min.js';?>"></script>
  </body>
</html>