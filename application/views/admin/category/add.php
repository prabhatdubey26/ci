    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Add Category</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <header>
            <div class="row">
                <div class="col-md-6">
                  <h1 class="h3 display">Add Category</h1>
                </div>
                <div class="col-md-6 ">
                  <a href="<?=base_url('admin/category')?>" class="btn btn-primary pull-right">LIST</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Add Category</h4>
                </div>
                <div class="card-body">                                
                 
                      
                      <form role="form" method="post" id="categoryForm">
                          <input type="hidden" name="id" id="id" value="<?=isset($record['id'])?$record['id']:''?>">
                          <div class="form-group">
                            <label>Name</label>
                            <input name="name" type="text" required class="form-control" value="<?=isset($record['name'])?$record['name']:''?>">
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

    $('#categoryForm').bind('submit', function () {

      var id = $("#id").val();

      if (id!='') {
          var url = '<?=base_url("admin/category/edit/");?>'+id;
      }else{
          var url = '<?=base_url("admin/category/add/");?>';
      }
    
    var form_data = new FormData($('#categoryForm')[0]);
      $.ajax({
        type: 'post',
        url: url,
        data: form_data,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#categoryForm")[0].reset();
          var data = jQuery.parseJSON(data);
           Swal.fire({
              icon: data.status,
              title: data.message,
              showConfirmButton: false,
              timer: 2500
            });
            setInterval(function(){
              location.reload(true);
            },2000); 
        }
      });
      return false;
    });

</script>