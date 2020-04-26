<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?=base_url();?>assets/font/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/fontastic.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/jquery.mCustomScrollbar.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
   
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">

  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase"><span>Admin</span><strong class="text-primary">Login</strong></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
            <form action="<?=base_url('admin/login')?>" method="post" class="text-left form-validate">
              <div class="form-group-material">
                <input id="login-username" type="email" name="email" required data-msg="Please enter your email" class="input-material">
                <label for="login-username" class="label-material">Email Id</label>
              </div>
              <div class="form-group-material">
                <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                <label for="login-password" class="label-material">Password</label>
              </div>
              <div class="form-group text-center">
                <!-- <a id="login" href="index.html" class="btn btn-primary">Login</a> -->
                <button class="btn btn-primary" type="submit" name="submit">Login</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><a href="#" class="forgot-pass">Forgot Password?</a>
          </div>
          <div class="copyrights text-center">
            <!-- <p>Design by <a href="#" class="external">Your company</a>                        </p> -->
          </div>
        </div>
      </div>
    </div>
      <!-- Error Message Sweat Alert js files-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <?php
  $msg = $this->session->flashdata('msg');
  $class = $this->session->flashdata('class');
  if (isset($msg)) {?>
    <script>
      Swal.fire({
        icon: '<?=$class?>',
        title: 'Oops...',
        text: '<?=$msg;?>',
        showConfirmButton: true,
        timer: 1500
      })
    </script>   
<?php }?>
    <!-- JavaScript files-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/js/popper.min.js"> </script>
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>


    <script src="<?=base_url();?>assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.cookie.js"></script>
    <script src="<?=base_url();?>assets/js/Chart.min.js"></script>
    <!-- Main File-->
    
    <script src="<?=base_url();?>assets/js/jquery.validate.min.js"></script>
    <script src="<?=base_url();?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url();?>assets/js/front.js"></script>
  </body>
</html>