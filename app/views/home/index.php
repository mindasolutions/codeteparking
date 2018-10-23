
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Codete Parking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal"><img src="/codete/public/img/codete_logo.png" style="height: 100px;"/></h5>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Park Your vehicle</h1>
      <p class="lead">Please select type of vehicle what You want to park on our parking.</p>
    </div>

    <div class="container">
      <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Bus</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">3 <small class="text-muted">parking spaces</small></h1>
            <a href="<?php echo BASE_URL; ?>home/parkBus/" class="btn btn-lg btn-block btn-primary">Park the bus</a>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Car</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">2 <small class="text-muted">parking spaces</small></h1>
            <a href="<?php echo BASE_URL; ?>home/parkCar/" class="btn btn-lg btn-block btn-primary">Park the car</a>
          </div>
        </div>
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Motocycle</h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">1 <small class="text-muted">parking space</small></h1>
            <a href="<?php echo BASE_URL; ?>home/parkMotocycle/" class="btn btn-lg btn-block btn-primary">Park the motocycle</a>
          </div>
        </div>
      </div>

      <div class="row">
      	<h5>Level of filling the car park:</h5>
		<div class="progress col-md-12 m-0 p-0">
		  <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $data['percent']; ?>%" aria-valuenow="<?php echo $data['percent']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $data['percent']; ?>%</div>
		</div>
		<h6>Free spaces avalible: <?php echo $data['free'];?></h6>
	  </div>
	
	  <div class="card-deck mb-3 text-center" style="margin-top: 20px;">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">Take your car back </h4>
          </div>
          <div class="card-body">
            <form action="<?php echo BASE_URL; ?>/home/departureVehicle" method="POST">
              <div class="form-group">
                <label for="placeVehicle">Enter place, where your car has been parked</label>
                <input type="vehicle" class="form-control" name="placeVehicle" id="placeVehicle" aria-describedby="vehicleHelp" placeholder="Enter your vehicle place">
                <small id="vehicleHelp" class="form-text text-muted">Only in this case will we be able to bring your vehicle back.</small>
              </div>
              <button type="submit" class="btn btn-primary">Give me it back!</button>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>

  </body>
</html>
