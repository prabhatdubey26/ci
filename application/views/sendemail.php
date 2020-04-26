<!DOCTYPE html>
<html>
  <head>
    <title>How to Send an Email with Attachment in Codeigniter</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <br />
    <div class="container">
      <div class="row">
        <div class="col-md-8" style="margin:0 auto; float:none;">
          <h3 align="center">How to Send an Email with Attachment in Codeigniter</h3>
          <br />
          <?php
 if($error = $this->session->flashdata('msg')){ ?>
       <p style="color: green;"><strong>Success!</strong> <?php echo  $error; ?><p>
  <?php } ?>
          <h4 align="center">Programmer Register Here</h4>
          <br />          
          <form method="post" action="<?php echo base_url(); ?>sendemail/send" enctype="multipart/form-data">
            <h2>Sent Email Using SMTP</h2><br>
                <input type="email" name="from" class="form-control" placeholder="Enter Email" required><br>
                <textarea name="message" class="form-control" placeholder="Enter message here" required></textarea><br>
                <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
