<?php $this->load->view('admin/include/header');?>
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>">Home</a></li>
            <li class="breadcrumb-item active">Manage User Lists       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="h3 display">Profile            </h1>
                </div>
                <div class="col-md-6 ">
                    <a href="<?=base_url()?>admin/manage_user" class="btn btn-primary pull-right">BACK</a>
                </div>
            </div> 
          </header>
          <div class="row">
            <div class="col-lg-4">
              <div class="card card-profile">
                <div style="background-image: url(<?=base_url()?>assets/images/users/d-cover.jpg);" class="card-header"></div>
                <div class="card-body text-center"><img src="<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>" class="card-profile-img">
                  <h3 class="mb-3" style="text-transform: uppercase;"><?=$record['username']?></h3>
                  <p class="mb-4">One morning, when Gregor Samsa woke from troubled </p>
                  <button class="btn btn-outline-dark btn-sm"><span class="fa fa-twitter"></span> Follow</button>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="media"><span style="background-image: url(<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>)" class="avatar avatar-xl mr-3"></span>
                    <div class="media-body">
                      <h4 style="text-transform: uppercase;"><?=$record['username']?></h4>
                      <p class="text-muted mb-0">Coder</p>
                      <ul class="social-links list-inline mb-0 mt-2">
                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Nathan's Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="@nathan_andrews"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="+420777555987"><i class="fa fa-phone"></i></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" data-original-title="@nathan"><i class="fa fa-skype"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <form class="card">
                <div class="card-header">
                  <h3 class="card-title">My Profile</h3>
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-auto d-flex align-items-center"><span style="background-image: url(<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>)" class="avatar avatar-lg"></span></div>
                    <div class="col">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <input placeholder="Your name" value="<?=$record['username']?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Bio</label>
                    <textarea rows="8" class="form-control">The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream.</textarea>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" placeholder="you@domain.com" value="<?=$record['user_email']?>" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Mobile No.</label>
                    <input type="number"  value="<?=$record['phone']?>" class="form-control" required>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <div class="col-lg-8">
              <div class="card">
                <div class="list-group card-list-group">
                  <div class="list-group-item py-5">
                    <div class="media">
                      <div style="background-image: url(<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>)" class="media-object avatar avatar-md mr-3"></div>
                      <div class="media-body">
                        <div class="media-heading"><small class="float-right">10 min</small>
                          <h5 style="text-transform: uppercase;"><?=$record['username']?></h5>
                        </div>
                        <div class="text-muted text-small">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</div>
                        <div class="media-list">
                          <div class="media mt-4">
                            <div style="background-image: url(img/avatar-3.jpg)" class="media-object avatar mr-3"></div>
                            <div class="media-body text-muted text-small"><strong class="text-dark">Serenity Mitchelle: </strong>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me?" he thought. It wasn't a dream.</div>
                          </div>
                          <div class="media mt-4">
                            <div style="background-image: url(img/avatar-1.jpg)" class="media-object avatar mr-3"></div>
                            <div class="media-body text-muted text-small"><strong class="text-dark">Tony O'Brian: </strong>His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table.</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item py-5">
                    <div class="media">
                      <div style="background-image: url(<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>)" class="media-object avatar avatar-md mr-3"></div>
                      <div class="media-body">
                        <div class="media-heading"><small class="float-right text-muted">12 min</small>
                          <h5 style="text-transform: uppercase;"><?=$record['username']?></h5>
                        </div>
                        <div class="text-muted text-small">Samsa was a travelling salesman - and above it there hung a picture that he had recently cut out of an illustrated magazine and housed in a nice, gilded frame.</div>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item py-5">
                    <div class="media">
                      <div style="background-image: url(<?php echo base_url('assets/images/users/')?><?php if(!empty($record['image'])){echo $record['image'];}else{echo'd-avatar.jpg';}?>)" class="media-object avatar avatar-md mr-3"></div>
                      <div class="media-body">
                        <div class="media-heading"><small class="float-right text-muted">34 min</small>
                          <h5 style="text-transform: uppercase;"><?=$record['username']?></h5>
                        </div>
                        <div class="text-muted text-small">He must have tried it a hundred times, shut his eyes so that he wouldn't have to look at the floundering legs, and only stopped when he began to feel a mild, dull pain there that he had never felt before.</div>
                        <div class="media-list">
                          <div class="media mt-4">
                            <div style="background-image: url(img/avatar-6.jpg)" class="media-object avatar mr-3"></div>
                            <div class="media-body text-muted text-small"><strong class="text-dark">Javier Gregory: </strong>One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php $this->load->view('admin/include/footer');?>