<?php $name = $this->session->userdata('name');
$id = $this->session->userdata('id');
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php  echo base_url('assets/css/web.css'); ?>">
    <title><?=$title;?></title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="<?php  echo base_url('dashboard'); ?>" ><img src="<?=isset($site_data['logo'])?base_url('assets/admin/image/logo/'.$site_data["logo"]):''?>" class="mx-3" style="height: 20px;width: 150px;"></a>
 <!--  <a class="navbar-brand" href="<?php  echo base_url('dashboard'); ?>"><?=isset($site_data['site_title'])?$site_data['site_title']:''?></a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if(!empty($status)){echo $status;}?>">
        <a class="nav-link" href="<?= base_url('dashboard')?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item <?php if(!empty($status)){echo $status;}?>">
        <a class="nav-link" href="<?= base_url('dashboard/about')?>">About</a>
      </li>
      <li class="nav-item <?php if(!empty($status)){echo $status;}?>">
        <a class="nav-link" href="<?= base_url('dashboard/fetch_user_list')?>">UserList</a>
      </li>
      <li class="nav-item <?php if(!empty($status)){echo $status;}?>">
        <a class="nav-link" href="<?= base_url('dashboard/contact')?>">Contact</a>
      </li>
    </ul>
    <?php
      if(!$this->session->userdata('is_login'))
      {?>
        <button class="btn btn-success"><a href="<?php echo base_url('register'); ?>" style="color: white;">Register</a></button>
        <button class="btn btn-success mx-2"><a href="<?php echo base_url('login'); ?>" style="color: white;">Login</a></button>
      <?php }else {
     ?>
      <button class="btn btn-success  my-sm-0 nav-item dropdown nav-link dropdown-toggle" type="button" id="navbarDropdown" role="button" data-toggle="dropdown">
         Welcome <?=$name;?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#" onclick="view_profile()">View Profile</a>
          <a class="dropdown-item" href="#" onclick="change_password()">Change Password</a>
        <a class="dropdown-item" href="#" onclick="logout()">Logout</a>
        </div>
      </button>
    <?php }?>
  </div>
</nav>
