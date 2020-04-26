<?php include 'header.php';?>
<div class="container" style="min-height: 465px;">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-4">
            <h5 style="text-align: center;"><u>Register Here</u></h5>
            <?php
                      $msg = $this->session->flashdata('msg');
                      $class = $this->session->flashdata('class');
                      if (isset($msg)) {?>

            <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
            </div>

            <?php }
                ?>

            <form action="<?php echo base_url('register/add');?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Father's Name</label>
                        <input type="text" class="form-control" name="father_name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Image</label>
                        <input type="file" class="form-control-file" name="image" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Address</label>
                        <textarea class="form-control" name="address" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="button" class="btn btn-secondary"> <a href="<?php echo base_url('login'); ?>"
                        style="color: white;">Login</a></button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php include 'footer.php';?>