<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php echo view('navbar') ?>
    <div class="container-fluid mt-3">
      <?php echo view($main_view) ?>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


