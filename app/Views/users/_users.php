<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(empty($users)): ?>
        <tr>
          <td colspan=3>Tidak ada data</td>
        </tr>
      <?php else: ?>
        <?php foreach($users as $index => $item): ?>
          <tr id="item_<?= $item['id'] ?>">
            <td><?= $order_number++ ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['email'] ?></td>
            <td>
              <?php
                if($item['status_id'] == 1):
                  echo "<span class='badge bg-primary'>Aktif</span>";
                else:
                  echo "<span class='badge bg-danger'>Tidak Aktif</span>";
                endif;
              ?>
            </td>
            <td>
              <form action="/users/delete" method="post" class="form-delete">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                <a href="/users/<?= $item['id'] ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
                <a href="/users/<?= $item['id'] ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
                <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
  <?= $pager->links('users', 'bootstrap_template') ?>