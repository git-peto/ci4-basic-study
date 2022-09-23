<h3>List Barang</h3>

<a href="/items/new" class="btn btn-sm btn-primary mb-2">Tambah Barang</a>

<?php foreach (session()->getFlashdata() as $key => $flash) : ?>
  <div class="alert alert-<?= $key ?>" role="alert">
    <?= $flash ?>
  </div>
<?php endforeach; ?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Satuan</th>
      <th>Harga</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Barang Satu</td>
      <td>Buah</td>
      <td>1.000.000</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Barang Dua</td>
      <td>Gram</td>
      <td>1.200.000</td>
    </tr>
    <tr>
      <td>3</td>
      <td>Barang Tiga</td>
      <td>Gram</td>
      <td>800.000</td>
    </tr>
  </tbody>
</table>