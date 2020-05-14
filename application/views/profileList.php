<?php 
include 'header.php'; ?>
<?php $name = $this->session->userdata('name'); ?>

<div class="container">
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead style="background: lime;">
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>Date</th>
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
                <td><img src="../assets/upload/<?=$row->image;?>" style="background:#e1e1e1;width:100px;padding:0px;height:100px;margin-top:0px"></td>
                <td><?=$row->timestamp;?></td>
            </tr>
          <?php }
        }?>
        </tbody>
</table>
</div>
<?php include 'footer.php'; ?>