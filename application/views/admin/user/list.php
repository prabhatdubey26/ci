    <?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Manage User Lists       </li>
          </ul>
        </div>
      </div>
      <section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h3 display">Manage User Lists            </h1>
                </div>
                <div class="col-md-6 ">
                    <a href="<?=base_url()?>admin/manage_user/add" class="btn btn-primary pull-right">ADD</a>
                </div>
            </div> 
          </header>
          <div class="card">
            <div class="card-header">
             <!--  <div class="dnuihfr3">
              <form class="form-inline" id="form-filter">
                <div class="form-group">
                  <input type="text" class="form-control" id="start_date" placeholder="From Date">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="end_date" placeholder="To Date">
                </div>
                <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
              </form>
            </div>  -->
            </div>
            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>So.no</th>
                                <th>Name</th>
                                <th>Father's Name</th>
                                <th>Email Id</th>
                                <th>Image</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
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
            "url": "<?php echo base_url('admin/manage_user/ajax_list')?>",
            "type": "POST",
            "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }              
        },
        "columns": [
                  { "data": "s_no" },
                  { "data": "name" },
                  { "data": "father_name" },
                  { "data": "email" },
                  { "data": "image" },
                  { "data": "address" },
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
          url: "<?php echo base_url('admin/manage_user/delete')?>",
          data: {id:id},
          success: function(resultData) { 
               if (resultData==1) { 
                Swal.fire({
                  icon: 'success',
                  title: 'Record Deleted success',
                  showConfirmButton: false,
                  timer: 2500
              });
               $("#row_"+id).remove();
                
            }
          }
        });
      }
    })
}
// function Active_record(id)
// {
//     Swal.fire({
//       title: 'Are you sure?',
//       text: "You won't be Deactive record",
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, Deactive it!'
//     }).then((result) => {
//       if (result.value) {
//         $.ajax({
//           type: 'POST',
//           url: "<?php echo base_url('admin/manage_user/active_record')?>",
//           data: {id:id},
//           success: function(resultData) { 
//                if (resultData==1) { 
//                 location.reload();
                
//             }
//           }
//         });
//       }
//     })
// }
// function Deactive_record(id)
// {
//     Swal.fire({
//       title: 'Are you sure?',
//       text: "You won't be Active record",
//       icon: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Yes, Active it!'
//     }).then((result) => {
//       if (result.value) {
//         $.ajax({
//           type: 'POST',
//           url: "<?php echo base_url('admin/manage_user/deactive_record')?>",
//           data: {id:id},
//           success: function(resultData) { 
//                if (resultData==1) { 
//                 location.reload();
                
//             }
//           }
//         });
//       }
//     })
// }
</script>
