<?php include 'header.php'; ?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="about-section paddingTB60 gray-bg">
                <div class="container">
                    <div class="row">
						<div class="col-md-7 col-sm-6">
							<div class="about-title clearfix">
								<h1>About <span><?=isset($site_data['site_title'])?$site_data['site_title']:''?></span></h1>
								<p class="about-paddingB"><?=isset($site_data['site_meta_description'])?$site_data['site_meta_description']:''?></p>
						<div class="about-icons"> 
                            <ul >
                                <li><a href="<?=isset($site_data['facebook'])?$site_data['facebook']:''?>" target="blank"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a> </li>
                                <li><a href="<?=isset($site_data['twitter'])?$site_data['twitter']:''?>" target="blank"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a> </li>
                                <li> <a href="<?=isset($site_data['youtube'])?$site_data['youtube']:''?>"><i id="social-yt" class="fa fa-youtube-square fa-3x social"></i></a> </li>
                                <li> <a href="mailto:<?=isset($site_data['email'])?$site_data['email']:''?>"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a> </li>
                                 <li> <a href="<?=isset($site_data['linkedin'])?$site_data['linkedin']:''?>"  target="blank"><i id="social-lk" class="fa fa-linkedin-square fa-3x social"></i></a> </li>
                            </ul>       
	        					</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
<?php include 'footer.php'; ?>
