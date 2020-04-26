
<?php include 'header.php';?>

<div class="container">
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			<h1 style="text-align: center;">Change Password</h1>
			<br/>
      <?php
            $msg = $this->session->flashdata('msg');
            $class = $this->session->flashdata('class');
            if (isset($msg)) {?>

              <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
              </div>
              
       <?php }?>
			<form class="form" action="<?=base_url('dashboard/change_password');?>" method="post" id="registrationForm">
                      <input type="hidden" name="id" value="<?=$id;?>">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Old Password</h4></label>
                              <input type="password" class="form-control" name="old_pass" id="old_pass" placeholder="enter old password" title="enter old password">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
                            <label for="last_name"><h4>New Password</h4></label>
                              <input type="password" class="form-control" name="new_pass" id="new_pass" placeholder="New Password"  title="enter your new password">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="email"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="enter confirm password"  title="enter confirm password">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update</button>
                               	<button class="btn btn-lg btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
                </form>
		</div>
		<div class="col-4"></div>

	</div>
</div>

<?php include 'footer.php';  ?>