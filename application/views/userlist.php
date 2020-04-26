<?php 
include 'header.php'; ?>
<?php $name = $this->session->userdata('name'); ?>

<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="background: lime;">
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Father's Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Status</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            if(count($data)){
            $i=1;
            foreach($data as $row){
          ?>
            <tr>
                <td><?=$i++;?></td>
                <td><?=$row->name;?></td>
                <td><?=$row->father_name;?></td>
                <td><?=$row->email;?></td>
                <td><img src="../assets/img/<?=$row->image;?>" height="50px" width="50px;"></td>
                <td><?php 
                    if ($row->status==1) {?>
                        <span class="badge badge-success">Active</span>
                  <?php } else {?>
                     <span class="badge badge-danger">Deactive</span>
                 <?php }
                ?></td>
                <td><?=$row->address;?></td>
            </tr>
          <?php }
        }?>
        </tbody>
</table>
</div>
<?php include 'footer.php'; ?>