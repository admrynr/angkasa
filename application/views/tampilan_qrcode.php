<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Input Sub Area</h2>
  <form class="user" method="post" action="<?php echo base_url(); ?>qrcode/cekin">
    <div class="form-group">
      <label for="subarea">Nama Sub Area:</label>
      <input type="text" class="form-control" id="subarea" name="subarea">
    </div>
    <div class="form-group">
      <label for="area">Nama Area:</label>
      <input type="text" class="form-control" id="area" name="area">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
      Submit
    </button>
  </form>
</div>

</body>
</html>
