<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="/pages">PROJECT HADES</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/pages/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/items">Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/employees">Pegawai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/users">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/customers">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/sales">Sale</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-auto">
          <form action="/sessions/logout" method="post">
            <button type="submit" class="btn btn-link nav-link"><?= current_user() == NULL ? "-" : current_user()['name'] ?> | Keluar</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>