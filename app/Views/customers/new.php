<h3>Tambah Customer</h3>

<a href="/customers" class="btn btn-sm btn-primary mb-2">List Customer</a>

<form action="/customers" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= set_value('name') ?>">
    <?php if (isset($errors) and $errors->getError('name')) { ?>
      <div class='text-danger mt-2'>
        <?= $error = $errors->getError('name'); ?>
      </div>
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="status_id" class="form-label">Status</label>
    <select name="status_id" class="form-control">
      <option value="1">Aktif</option>
      <option value="2">Tidak Aktif</option>
    </select>
  </div>
  <div class="mb-3">
    <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
</form>