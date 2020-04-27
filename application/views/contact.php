<?php include 'header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 p-100">
			<h3 style="text-align: center;">Google Map</h3>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj2tSxH5GRk1LmIzQw2tuPF5v5KTgfBxo&callback=getLocation"></script>
		<script>
			function getLocation() {
			  if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition);
			  } 
			  else { 
				document.getElementById("map").innerHTML = "Geolocation is not supported by this browser.";
			  }
			}
			
			function showPosition(position) {
			  //window.location.href="https://www.google.com/maps?q="+position.coords.latitude+","+position.coords.longitude+"";
			  initMap(position.coords.latitude, position.coords.longitude);
			}
			
			function initMap(lt, lg) {
			  var location = {lat: lt, lng: lg};
			  var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 19, 
				center: location
			  });
			  var marker = new google.maps.Marker({position: location, map: map});
			  var trafficLayer = new google.maps.TrafficLayer();
			  trafficLayer.setMap(map);
			}
		</script>
</script>

		<div class="my-2" id="map" style="height: 500px; width: 100%;"></div>
		</div>
		<div class="col-md-6 my-2">
			<h2 style="text-align: center;">Contact Us</h2>
			<?php
                      $msg = $this->session->flashdata('msg');
                      $class = $this->session->flashdata('class');
                      if (isset($msg)) {?>

            <div id="fadeout-msg" class="alert alert-<?=$class?>">
                <?=$msg?>
            </div>

            <?php }
                ?>
	<form action="<?=base_url('dashboard/contact');?>" method='POST'>
		<div class="form-group">
			    <label for="exampleInputEmail1">Name</label>
			    <input type="text" class="form-control" name="name">
		  </div>
		  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" name="email">
		  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile</label>
    <input type="number" class="form-control" name="mobile">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
		<input type="text" class="form-control" name="address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Message</label>
    <textarea name="message" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<?php include 'footer.php'; ?>
