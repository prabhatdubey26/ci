<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$title?></title>
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
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?=base_url();?>assets/css/custom.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><a href="<?=base_url();?>admin/dashboard"><img src="<?=isset($site_data['logo'])?base_url('assets/admin/image/logo/'.$site_data["logo"]):''?>" alt="logo" class="img-fluid rounded-circle"></a>
            <h2 class="h5"><?=isset($site_data['site_title'])?$site_data['site_title']:''?></h2><span>ADMIN</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="<?=base_url('admin/dashboard');?>" class="brand-small text-center"> <strong>P</strong><strong class="text-primary">T</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li class="<?=($this->uri->segment(2)=='dashboard')?'active':''?>" ><a href="<?=base_url('admin/dashboard');?>"> <i class="icon-home"></i>Dashboard</a></li>

            <li><a href="#pagesDropdown" aria-expanded="<?=($this->uri->segment(2)=='site_setting')||($this->uri->segment(2)=='page')?'true':'false'?>" data-toggle="collapse" > <i class="icon-interface-windows"></i>Setting </a>
              <ul id="pagesDropdown" class="collapse list-unstyled <?=($this->uri->segment(2)=='site_setting')||($this->uri->segment(2)=='page')?'show':''?>">
                <li class="<?=($this->uri->segment(2)=='site_setting')?'active':''?>"><a href="<?=base_url('admin/site_setting');?>">Site Setting</a></li>
                <li class="<?=($this->uri->segment(2)=='page')?'active':''?>"><a href="<?=base_url('admin/page');?>">Manage Page</a></li>                
              </ul>
            </li>
            <li class="<?=($this->uri->segment(2)=='manage_user')?'active':''?>"><a href="<?=base_url('admin/manage_user');?>"><i class="icon-user"></i>Manage Users </a>
            </li>
            
            <!-- <li class="<?=($this->uri->segment(2)=='members_plan')?'active':''?>"><a href="<?=base_url('admin/members_plan');?>"><i class="icon-grid"></i>Manage Membership </a>
            </li> -->
            <!-- <li><a href="#pagesDropdown1" aria-expanded="<?=($this->uri->segment(2)=='category')||($this->uri->segment(2)=='default_questions')?'true':'false'?>" data-toggle="collapse" > <i class="icon-interface-windows"></i>Manage Question </a>
              <ul id="pagesDropdown1" class="collapse list-unstyled <?=($this->uri->segment(2)=='category')||($this->uri->segment(2)=='default_questions')?'show':''?>">
                <li class="<?=($this->uri->segment(2)=='category')?'active':''?>"><a href="<?=base_url('admin/category');?>">Question categories</a></li>
                <li class="<?=($this->uri->segment(2)=='default_questions')?'active':''?>"><a href="<?=base_url('admin/default_questions');?>">Robot questions</a></li>
              </ul>
            </li> -->
            <li class="<?=($this->uri->segment(2)=='blog')?'active':''?>"><a href="<?=base_url('admin/blog');?>"><i class="icon-interface-windows"></i>Manage Blogs </a>
            </li>
            <!-- <li class="<?=($this->uri->segment(2)=='transaction')?'active':''?>"><a href="<?=base_url('admin/transaction');?>"> <i class="icon-mail"></i>View Transaction<div class="badge badge-warning">6 New</div></a></li> -->
            
          </ul>
        </div>
        
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="<?=base_url('admin/dashboard');?>" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Prabhat Tech </span><strong class="text-primary">Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-warning">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-envelope"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-upload"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification d-flex justify-content-between">
                          <div class="notification-content"><i class="fa fa-twitter"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-bell"></i>view all notifications                                            </strong></a></li>
                  </ul>
                </li>
                <!-- Messages dropdown-->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope"></i><span class="badge badge-info">10</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Jason Doe</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Frank Williams</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item d-flex"> 
                        <div class="msg-profile"> <img src="<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="msg-body">
                          <h3 class="h5">Ashley Wood</h3><span>sent you a direct message</span><small>3 days ago at 7:58 pm - 10.06.2014</small>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-envelope"></i>Read all messages    </strong></a></li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
                <!-- <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="images/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="images/DE.png" alt="English" class="mr-2"><span>German</span></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="images/FR.png" alt="English" class="mr-2"><span>French                                                         </span></a></li>
                  </ul>
                </li> -->
                <!-- Log out-->
                <li class="nav-item"><a href="<?=base_url('admin/dashboard/logout')?>" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>