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
      <h1 class="display-4">You successfully take your <?php echo $data['carType']; ?></h1>
      <p class="lead">Your <?php echo $data['carType']; ?> has been succesfuly departure from <?php echo $data['parkedId']; ?> side.</p>
    </div>

    <div class="container">
      <a href="<?php echo BASE_URL; ?>home/" class="btn btn-primary">Go back</a>
    </div>

  </body>
</html>