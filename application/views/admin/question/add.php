    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Add Question</li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <header>
            <div class="row">
                <div class="col-md-6">
                  <h1 class="h3 display">Add Question</h1>
                </div>
                <div class="col-md-6 ">
                  <a href="<?=base_url('admin/default_questions')?>" class="btn btn-primary pull-right">LIST</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-10">
              <div class="card">
                <div class="card-header">
                  <h4>Add Question</h4>
                </div>
                <div class="card-body">
                  <form role="form" method="post" id="questionsForm">
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
                      <label>Question</label>
                      <input name="que" type="text" placeholder="Please Enter your Question ??" required class="form-control" value="<?=isset($record['que'])?$record['que']:''?>">
                    </div>
                    <div class="form-group">
                      <label class="form-label">Answers</label>
                        <textarea rows="5" placeholder="Here can be your description.." name="answer" class="form-control"><?=isset($record['answer'])?$record['answer']:''?></textarea>
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

    $('#questionsForm').bind('submit', function () {

      var id = $("#id").val();

      if (id!='') {
          var url = '<?=base_url("admin/default_questions/edit/");?>'+id;
      }else{
          var url = '<?=base_url("admin/default_questions/add/");?>';
      }
    
    var form_data = new FormData($('#questionsForm')[0]);
      $.ajax({
        type: 'post',
        url: url,
        data: form_data,
        processData: false,
        contentType: false,
        success: function (data) {
          $("#questionsForm")[0].reset();
          var data = jQuery.parseJSON(data);
           Swal.fire({
              icon: data.status,
              title: data.message,
              showConfirmButton: false,
              timer: 2500
            });
            setTimeout(function() {
              window.location.href = '<?=base_url("admin/default_questions");?>';
            }, 2000); 
        }
      });
      return false;
    });

</script>