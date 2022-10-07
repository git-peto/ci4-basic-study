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
      <th>Image</th>
      <th>Nama</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php if(empty($items)): ?>
      <tr>
        <td colspan=3>Tidak ada data</td>
      </tr>
    <?php else: ?>
      <?php foreach($items as $index => $item): ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><img src="/assets/images/<?= $item->image_name ?>" alt="Image for <?= $item->name ?>" width="200px"/></td>
          <td><?= $item->name ?></td>
          <td><?= $item->unit ?></td>
          <td><?= $item->price ?></td>
          <td>
            <form action="/items/delete" method="post">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="id" value="<?= $item->id ?>" />
              <a href="/items/<?= $item->id ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
              <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

