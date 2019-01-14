<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Logar no Coala</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/vendor.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/flat-admin.css');?>">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme/blue-sky.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme/blue.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme/red.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme/yellow.css');?>">

</head>
<body>
  <div class="app app-default">

<div class="app-container app-login">
  <div class="flex-center">
    <div class="app-header"></div>
    <div class="app-body">
      <div class="loader-container text-center">
          <div class="icon">
            <div class="sk-folding-cube">
                <div class="sk-cube1 sk-cube"></div>
                <div class="sk-cube2 sk-cube"></div>
                <div class="sk-cube4 sk-cube"></div>
                <div class="sk-cube3 sk-cube"></div>
              </div>
            </div>
          <div class="title">Logging in...</div>
      </div>
      <div class="app-block">
      <div class="app-form">
        <div class="form-header">
          <div class="app-brand"><span class="highlight">Koala</span></div>
        </div>
        <?php echo form_open();?>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">
                <i class="fa fa-user" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Username" name="login" aria-describedby="basic-addon1">
            </div>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2">
                <i class="fa fa-key" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Password" name="senha" aria-describedby="basic-addon2">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-success btn-submit" value="Login">
            </div>
        <?php form_close();?>

      </div>
      </div>
    </div>
    <div class="app-footer">
    </div>
  </div>
</div>

  </div>
  
  <script type="text/javascript" src="../assets/js/vendor.js"></script>

</body>
</html>