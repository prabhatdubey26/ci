    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Site Setting</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <header>
            <div class="row">
                <div class="col-md-6">
                  <h1 class="h3 display"> Edit Site Setting             </h1>
                </div>
                <div class="col-md-6 ">
                  <a href="<?=base_url('admin/site_setting')?>" class="btn btn-primary pull-right">BACK</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Edit Site Setting</h4>
                </div>
                <div class="card-body"> 
                      <form role="form" id="site_name_form" method="post">
                      <div class="col-sm-12 col-md-12 col-12">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Site Name</label>
                              <input type="text" class="form-control" id="site_name" name="site_name" value="<?=isset($record['site_name'])?$record['site_name']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Site Title</label>
                              <input type="text" class="form-control" id="site_title" name="site_title" value="<?=isset($record['site_title'])?$record['site_title']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Meta Keyword</label>
                              <input type="text" class="form-control" id="site_meta_keyword" name="site_meta_keyword" value="<?=isset($record['site_meta_keyword'])?$record['site_meta_keyword']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Meta Description</label>
                              <input type="text" class="form-control" id="site_meta_description" name="site_meta_description" value="<?=isset($record['site_meta_description'])?$record['site_meta_description']:''?>" required>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1"><h4>Host Details</h4></label>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1">SMTP Host</label>
                              <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?=isset($record['smtp_host'])?$record['smtp_host']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">SMTP Username</label>
                              <input type="text" class="form-control" id="smtp_username" name="smtp_username" value="<?=isset($record['smtp_username'])?$record['smtp_username']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">SMTP Password</label>
                              <input type="text" class="form-control" id="smtp_password" name="smtp_password" value="<?=isset($record['smtp_password'])?$record['smtp_password']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">SMTP Port</label>
                              <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?=isset($record['smtp_port'])?$record['smtp_port']:''?>" required>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1"><h4>Basic Information</h4></label>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="text" class="form-control" id="email" name="email" value="<?=isset($record['email'])?$record['email']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Contact</label>
                              <input type="text" class="form-control" id="contact" name="contact" value="<?=isset($record['contact'])?$record['contact']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Address</label>
                              <input type="text" class="form-control" id="address" name="address" value="<?=isset($record['address'])?$record['address']:''?>" required>
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Facebook</label>
                              <input type="text" class="form-control" id="facebook" name="facebook" value="<?=isset($record['facebook'])?$record['facebook']:''?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Twitter</label>
                              <input type="text" class="form-control" id="twitter" name="twitter" value="<?=isset($record['twitter'])?$record['twitter']:''?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Youtube</label>
                              <input type="text" class="form-control" id="youtube" name="youtube" value="<?=isset($record['youtube'])?$record['youtube']:''?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Instagram</label>
                              <input type="text" class="form-control" id="instagram" name="instagram" value="<?=isset($record['instagram'])?$record['instagram']:''?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Iinkedin</label>
                              <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?=isset($record['linkedin'])?$record['linkedin']:''?>">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Logo</label>
                              <input type="file" class="form-control" name="img_file">

                              <?php
                                  if(isset($record['logo']) && !empty($record['logo']))
                                  {?>

                                      <img src="<?=base_url('assets/admin/image/logo/'.$record['logo']);?>">
                                      
                                  <?php }
                              ?>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>

                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php $this->load->view('admin/include/footer');?>
<script type="text/javascript">

  $(function () {
    $('#site_name_form').bind('submit', function () {
    var form_data = new FormData($('#site_name_form')[0]);
      $.ajax({
        type: 'post',
        url: '<?=base_url('admin/site_setting/edit/'.$record['id']);?>',
        data: form_data,
        processData: false,
        contentType: false,
        success: function (data) {
          var data = jQuery.parseJSON(data);
           Swal.fire({
              icon: data.status,
              title: data.message,
              showConfirmButton: false,
              timer: 2500
            }) 
        }
      });
      return false;
    });
  });
</script>