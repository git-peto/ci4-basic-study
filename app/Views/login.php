<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .bg-kanan {
        background-image: url('/assets/images/foto.jpg');
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="container mt-5">
          <form action="/checklogin" method="post">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="password">
            </div>
            <div class="mb-3">
              <input type="submit" value="Masuk" class="btn btn-secondary">
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6 d-none d-md-block bg-kanan" style="height: 100vh">
        <!-- <img src="/assets/images/foto.jpg" alt="FOTO" width="100%> -->
      </div>
    </div>
    

    <script src="/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>


