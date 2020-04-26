
 <!-- Page Content -->
  <div class="container">

    <div class="row">
     
      <!-- Post Content Column -->
      <div class="col-lg-8">
         <?php if(count($blog)){ 
      foreach ($blog as $row) {
      ?>
        <div class="row">
          <div class="col-md-12"> 
        <!-- Title -->
        <h1 class="mt-4"><a href="<?php echo base_url('dashboard/blog/'.$row->slug);?>" class="text-dark"><?=$row->title;?></a></h1>

        <!-- Author -->
        <p class="lead">
         Posted by
          <a href="#">Admin</a>
        </p>

        <hr>
        <!-- Date/Time -->
        <p>Posted on <?=$row->created_at;?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="<?php echo base_url('assets/admin/image/blog/'.$row->image); ?>" alt="" style="height: 300px;width: 100%;">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php $str = $row->description;
          $rs = str_split($str, 150);
          echo $rs[0].'...............';

        ?></p>
        <button class="btn btn-secondary my-2"><a href="<?php echo base_url('dashboard/blog/'.$row->slug);?>" class="text-light">Read More</a></button>
        </div>
        </div>
        <?php } }?>
            <?php echo $this->pagination->create_links(); ?>
      </div>
    
      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->