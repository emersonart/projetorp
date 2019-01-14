<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Atividades IFRN</title>
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
        <div class="app-right-section">
          <div class="app-brand text-center">
            <img src="<?php echo base_url('assets/images/logo/logo-branco.png');?>" style="width: 150px;height:auto;" ><br><br>
            <span class="highlight">Koala</span> <span style="font-size:.7em"> educational</span>
          </div>
          <div class="app-info">
            
            <ul class="list">
              <li>
                <div class="icon">
                  <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                </div>
                <div class="title">Increase <b>Productivity</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-cubes" aria-hidden="true"></i>
                </div>
                <div class="title">Lot of <b>Components</b></div>
              </li>
              <li>
                <div class="icon">
                  <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
                <div class="title">Forever <b>Free</b></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="app-form">
          <div class="form-suggestion">
            Possui um código de turma? Crie já sua conta!
          </div>
          <?php echo get_msg();?>
          <?php echo form_open();?>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">
                  <i class="fa fa-address-card" aria-hidden="true"></i></span>
                <input type="text" value="<?php echo set_value('matricula'); ?>" class="form-control" placeholder="Matrícula" name="matricula" aria-describedby="basic-addon1">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" value="<?php echo set_value('login'); ?>" class="form-control" placeholder="Username" name="login" aria-describedby="basic-addon2">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" value="<?php echo set_value('nome'); ?>" class="form-control" placeholder="Nome" name="nome" aria-describedby="basic-addon3">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">
                  <i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" value="<?php echo set_value('sobrenome'); ?>" class="form-control" placeholder="Sobrenome" name="sobrenome" aria-describedby="basic-addon4">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon5">
                  <i class="fa fa-envelope" aria-hidden="true"></i></span>
                <input type="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon5">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon6">
                  <i class="fa fa-key" aria-hidden="true"></i></span>
                <input type="password" value="<?php echo set_value('senha'); ?>" class="form-control" placeholder="Password" name="senha" aria-describedby="basic-addon6">
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon7">
                  <i class="fa fa-check" aria-hidden="true"></i></span>
                <input type="password" class="form-control" placeholder="Confirm Password" name="senha2" aria-describedby="basic-addon7">
              </div>
               <div class="input-group">
                <span class="input-group-addon" id="basic-addon8">
                  <i class="fa fa-users" aria-hidden="true"></i></span>
                <input type="text" value="<?php echo set_value('codigoturma'); ?>" class="form-control" placeholder="Código da turma" name="codigoturma" aria-describedby="basic-addon8">
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-success btn-submit" value="Cadastrar">cadastrar</button>
              </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>

  </div>
</div>

  </div>
  
  <script type="text/javascript" src="<?php echo base_url('assets/js/vendor.js');?>"></script>

  <div class="autocomplete-suggestions" style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>

</body>
</html>