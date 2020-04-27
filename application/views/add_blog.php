<?php include 'header.php'; ?>
<div class="container">
 <div class="row">
 	<div class="col-lg-2"></div>
            <div class="col-lg-8 my-4">
              <div class="card">
                <div class="card-header">
                  <h4>Add Blog</h4>
                </div>
                <div class="card-body">                                
                  <form role="form" method="post" id="add_contant_form" enctype="multipart/form-data">
                    <input type="hidden" name="created_id" id="id" value="<?=isset($id)?$id:''?>">
                    <div class="form-group">
                      <label>Title</label>
                      <input name="title" type="text" required class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Content</label>
                        <textarea class="form-control" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input name="image" type="file" class="form-control-file">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select class="form-control" name="status" id="status">
                          <option value="1" selected="">Active</option>
                          <option value="0">Deactive</option>
                      </select>
                    </div>
                    <div class="form-group">       
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
     <div class="col-lg-2"></div>
  </div>
</div>
<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    $('#add_contant_form').bind('submit', function () {
      var url = '<?=base_url("dashboard/add_blog/");?>';
      var form_data = new FormData($('#add_contant_form')[0]);
      $.ajax({
        type: 'post',
        url: url,
        data: form_data,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#add_contant_form")[0].reset();
          var data = jQuery.parseJSON(data);
           Swal.fire({
              icon: data.status,
              title: data.message,
              showConfirmButton: false,
              timer: 2500
            });
            setTimeout(function() {
              window.location.href = '<?=base_url("dashboard");?>';
            }, 2500);
        }
      });
      return false;
    });

</script>
<?php include 'footer.php'; ?>
