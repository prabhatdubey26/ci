<?php include 'header.php'; ?>

<div class="container my-3">

       <h2 class="blog-post-title"><?=$blog["title"];?></h2>
        <p class="blog-post-meta"><?=$blog["created_at"];?> </p>
       <p class="lead">
         Posted by
          <a href="<?php echo base_url("dashboard/about") ?>"> 
            <?=$blog["name"];?>
            </a>
        </p>
         <img class="img-fluid rounded" src="<?php echo base_url('assets/admin/image/blog/'.$blog['image']); ?>" alt="" style="height: 300px;width: 100%;">
        <p class="my-4"><?=$blog["description"];?></p>
       
        <hr>
      </div>
      <div class="container">
      <?php if($this->session->userdata('is_login'))
      {
      	?> 
        <!-- Comments Form -->
        <?php
          $msg = $this->session->flashdata('msg');
          $class = $this->session->flashdata('class');
          if (isset($msg)) {?>

            <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
            </div>

            <?php }
                ?>
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="<?=base_url('dashboard/addcomment/'.$blog["slug"])?>" method="post">
                <input type="hidden" name="blog_id" value="<?=$blog["id"];?>">
                <input type="hidden" name="user_id" value="<?=$id?>">
              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <h5 class="card-header my-4">Total Comment (<?=count($comment)?>)</h5>

        <form> 	
        <?php } else {?>
        	<button class="btn btn-secondary mx-2 my-4"><a href="<?php echo base_url('login'); ?>" style="color: white;">Login</a></button>
       <?php  } ?>
        <!-- Single Comment -->
        <?php 
        //print_r($comment);die();
        foreach ($comment as $com ) {
       	?>
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle " src="<?=base_url('assets/img/'.$com->image);?>" alt="" height="50px" width=50px;>
          <div class="media-body">
            <h5 class="mt-0"><?=$com->name;?> <small><?=$com->timestamp;?></small></h5> 
            <p><?=$com->comment;?></p>
            <?php if($this->session->userdata('is_login'))
      		{
      		?>
            <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse"data-target="#openReply_<?=$com->id?>" aria-expanded="false" aria-controls="collapseExample">Add Reply </button>
                    <!-- replies are here -->
                    <div class="collapse" id="openReply_<?=$com->id?>">
                          <form action="<?=base_url('dashboard/addcomment/'.$blog["slug"])?>" method="post">
			                <input type="hidden" name="blog_id" value="<?=$blog["id"];?>">
			                <input type="hidden" name="user_id" value="<?=$id?>">
			                <input type="hidden" name="parent_id" value="<?=$com->id;?>">
                            <textarea type="text" class="form-control my-2" placeholder="Write a reply..." name="comment"></textarea>
                            <input type="hidden" name="parentSno" value="{{comment.sno}}">
                            <button class="btn btn-sm btn-primary" type="submit">Reply</button>
                        </form>
                    </div>
               <?php } if(!empty($com->parent_id)) {?>
              <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>
        <?php }?>
          </div>
        </div> 
        <?php } ?> 
      </div>

<?php include 'footer.php'; ?>
