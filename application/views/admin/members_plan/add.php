    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Membership</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <header>
            <div class="row">
                <div class="col-md-6">
                  <h1 class="h3 display">Add Membership</h1>
                </div>
                <div class="col-md-6 ">
                  <a href="<?=base_url('admin/members_plan')?>" class="btn btn-primary pull-right">LIST</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Add Membership</h4>
                </div>
                <div class="card-body">                                
                  <form role="form" method="post" id="add_contant_form" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?=isset($record['id'])?$record['id']:''?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Select Question Category</label>
                      <select class="form-control" name="q_cat_id">
                        <option value=""> -- Select Question Category -- </option>
                        <?php for ($i=0; $i <count($q_cat) ; $i++) { ?>
                          <option value="<?=$q_cat[$i]['id']?>" <?php if(isset($record['q_cat_id']) && $record['q_cat_id']==$q_cat[$i]['id']){echo 'selected';}?>><?=$q_cat[$i]['name']?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Duration Time (in months)</label>
                        <div class="row">
                          <div class="col-md-4">
                            <input type="text" name="time_to" placeholder="Time To" id="datepicker1" value="<?=isset($record['time_to'])?$record['time_to']:''?>" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <input type="text" name="time_from" placeholder="Time From" id="datepicker2" value="<?=isset($record['time_from'])?$record['time_from']:''?>" class="form-control">
                          </div>
                          <div class="col-md-4">
                            <span id="output">*</span>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Amount</label>
                      <input name="amount" type="number" required class="form-control" value="<?=isset($record['amount'])?$record['amount']:''?>">
                    </div>
                    <div class="form-group">
                      <label>Membership plan Name</label>
                      <input name="name" type="text" required class="form-control" value="<?=isset($record['name'])?$record['name']:''?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Membership plan Description</label>
                        <textarea class="form-control ckeditor" name="disc" id="disc"><?=isset($record['disc'])?$record['disc']:''?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input name="file" type="file" class="form-control">
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

    CKEDITOR.replace('disc', {
        filebrowserImageUploadUrl : baseUrl + 'ckeditor/image_upload',
        filebrowserUploadMethod: 'form'
    });

    $('#add_contant_form').bind('submit', function () {
      for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

      var id = $("#id").val();

      if (id!='') {
          var url = '<?=base_url("admin/members_plan/edit/");?>'+id;
      }else{
          var url = '<?=base_url("admin/members_plan/add/");?>';
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
              window.location.href = '<?=base_url("admin/members_plan");?>';
            }, 2500);
        }
      });
      return false;
    });

</script>
<script>
 var d1,d2; 
 $('#datepicker1').datepicker({
            format: 'yyyy/mm/dd',
            endDate: 'd'
        });
$('#datepicker2').datepicker({
            format: 'yyyy/mm/dd',
            startDate: '-d'            
        });
 
</script>
