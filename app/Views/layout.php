<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
    <style>
      ul.ui-autocomplete {
        z-index: 99999;
      }
    </style>
  </head>
  <body>
    <?php echo view('navbar') ?>
    <div class="container-fluid mt-3">
      <?php echo view($main_view) ?>
    </div>

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
