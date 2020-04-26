<?php include 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6">
        <?php
            $msg = $this->session->flashdata('msg');
            $class = $this->session->flashdata('class');
            if (isset($msg)) {?>
              <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
              </div>    
       <?php }?>
        <form action="<?php echo base_url('register/edit/'.$id);?>" method="post" enctype="multipart/form-data">
               <div class="text-center">
          <?php  if (!empty($data->image)) {?>
             <img src="../../assets/img/<?=$data->image?>" class="avatar img-circle img-thumbnail" style="height: 200px;width: 200px;border-radius: 50%;">
          <?php } else {?>
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar" style="height: 200px;width: 200px;border-radius: 50%;">
       <?php }?>
          <h6>Upload a different photo...</h6>
          <input type="file" class="text-center center-block file-upload" value="<?php if (isset($data->image) && !empty($data->image)) {  echo $data->image; } else {} ?>" name="image">
        </div></hr><br>

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Full name</h4></label>
                              <input type="text" class="form-control" name="name" id="first_name" placeholder="Full name" value="<?=$data->name;?>" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group"> 
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Father's name</h4></label>
                              <input type="text" class="form-control" name="father_name" id="last_name" placeholder="Father's name" value="<?=$data->father_name;?>" title="enter your last name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                   
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="<?=$data->email;?>" title="enter your email." readonly="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Address</h4></label>
                              <textarea class="form-control" name="address"><?=$data->address;?></textarea>
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
       </div><!--/col-md-6-->
       <div class="col-md-3"></div>
    </div><!--/row-->
 </div>
<?php include 'footer.php';  ?>