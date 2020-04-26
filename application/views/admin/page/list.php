    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Pages Lists       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h3 display">Manage Pages Lists            </h1>
                </div>
                <div class="col-md-6 ">
                    <a href="<?=base_url()?>admin/page/add" class="btn btn-primary pull-right">ADD</a>
                </div>
            </div> 
          </header>
          <div class="card">
            <div class="card-header">
              <h4>Pages Lists</h4>
            </div>
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>So.no</th>
                                <th>Title</th>
                                <th>Meta Keyword</th>
                                <th>Meta Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>So.no</th>
                                <th>Title</th>
                                <th>Meta Keyword</th>
                                <th>Meta Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </section>
      <?php $this->load->view('admin/include/footer');?>
<script type="text/javascript">
 
var table;
 
$(document).ready(function() {
    

    //datatables
    var csrf_test_name = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('admin/page/ajax_list')?>",
            "type": "POST",
            "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
                           
        },
        "columns": [
                  { "data": "s_no" },
                  { "data": "title" },
                  { "data": "meta_keyword" },
                  { "data": "meta_description" },
                  { "data": "status" },
                  { "data": "action" },
               ],
 
        //Set column definition initialisation properties.
        /*"columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],*/
 
    });
 
    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
    });
 
});

function delete_record(id)
{
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: "<?php echo base_url('admin/page/delete')?>",
          data: {id:id},
          success: function(resultData) { 
               if (resultData==1) { 
               $("#row_"+id).remove();
                
            }
          }
        });
      }
    })
}
 
</script>
