<?php

 ?>
<html lang="en">
<head>
  <title>Crop Image</title>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
</head>
<body>   
<div class="container">
	<div class="panel panel-default">
	  <div class="panel-heading">Crop Image</div>
	  <div class="panel-body">
     <?php
           $msg = $this->session->flashdata('msg');
            $class = $this->session->flashdata('class');
            if (isset($msg)) {?>
            <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
            </div>
            <?php }
                ?>
	  	<div class="row">
	  			<button class="btn btn-success"><a href="<?=base_url('MyFormController/profilelist');?>" style="color: white;" class="">Profile List</a></button>
	  		<div class="col-md-4 text-center">
				<div id="upload-demo" style="width:350px"></div>
	  		</div>
	  		<div class="col-md-4" style="padding-top:30px;">
	  			<strong>Enter Name:</strong>
				<br/>
				<input type="text" id="name">
				<br>
				<strong>Select Image:</strong>
				<br/>
				<input type="file" id="upload">
				<br/>
				<button class="btn btn-success upload-result">Upload Image</button>
	  		</div>
	  		<div class="col-md-4" style="">
				<div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
	  		</div>
	  	</div>
      
	  </div>
	</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>    
<script type="text/javascript">
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});
$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	    
    }
    reader.readAsDataURL(this.files[0]);
});
     
$('.upload-result').on('click', function (ev) {
	var name =  $('#name').val();
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
     
		$.ajax({
			url: "<?=base_url('MyFormController/post');?>",
			type: "POST",
			data: {"image":resp,"name":name},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
			}
		});
	});
});
    
</script>
</body>
</html>