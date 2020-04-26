<?php include"header.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="min-height: 460px;">
            <h5 style="text-align: center;"><u>Login Here</u></h5>
            <?php
              $msg = $this->session->flashdata('msg');
              $class = $this->session->flashdata('class');
              if (isset($msg)) {?>
            <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
            </div>
            <?php }?>
            <form action="<?php echo base_url('login');?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" name="password" required="">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-secondary"> <a href="<?php echo base_url('register'); ?>"
                        style="color: white;">Register</a></button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php include "footer.php"; ?>