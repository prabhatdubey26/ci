    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Pages Add       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <header>
            <div class="row">
                <div class="col-md-6">
                  <h1 class="h3 display">Add New Pages             </h1>
                </div>
                <div class="col-md-6 ">
                  <a href="<?=base_url('admin/page')?>" class="btn btn-primary pull-right">LIST</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Add New Pages</h4>
                </div>
                <div class="card-body">                                
                  <form role="form" method="post" id="add_contant_form">
                    <input type="hidden" name="id" id="id" value="<?=isset($record['id'])?$record['id']:''?>">
                    <div class="form-group">
                      <label>Title</label>
                      <input name="title" type="text" required class="form-control" value="<?=isset($record['title'])?$record['title']:''?>">
                    </div>
                    <div class="form-group">
                      <label>Meta Keyword</label>
                      <input name="meta_keyword" type="text" required class="form-control" value="<?=isset($record['meta_keyword'])?$record['meta_keyword']:''?>">
                    </div>
                    <div class="form-group">
                      <label>Meta Description</label>
                      <input name="meta_description" type="text" required class="form-control" value="<?=isset($record['meta_description'])?$record['meta_description']:''?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Content</label>
                        <textarea class="form-control ckeditor" name="content" id="content"><?=isset($record['content'])?$record['content']:''?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <select class="form-control" name="status" id="status">
                          <option value="1" <?php if(isset($record['status']) && $record['status']=='1'){echo 'selected';}?>>Active</option>
                          <option value="0" <?php if(isset($record['status']) && $record['status']=='0'){echo 'selected';}?>>Deactive</option>
                      </select>
                    </div>
                    <div class="form-group">       
                      <button type="submit" class="btn btn-primary">Submit</button>
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
  CKEDITOR.replace('content', {
        filebrowserImageUploadUrl : baseUrl + 'ckeditor/image_upload',
        filebrowserUploadMethod: 'form'
    });

    $('#add_contant_form').bind('submit', function () {
      for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

      var id = $("#id").val();

      if (id!='') {
          var url = '<?=base_url("admin/page/edit/");?>'+id;
      }else{
          var url = '<?=base_url("admin/page/add/");?>';
      }
    
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
              window.location.href = '<?=base_url("admin/page");?>';
            }, 2500);
        }
      });
      return false;
    });

</script>