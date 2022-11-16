<h3>Ubah Customer</h3>

<a href="/customers" class="btn btn-sm btn-primary mb-2">List Customer</a>

<form action="/customers/<?= $customer['id'] ?>" method="post">
  <input type="hidden" name="_method" value="PUT" />
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= $customer['name'] ?>">
    <?php if (isset($errors) and $errors->getError('name')) { ?>
      <div class='text-danger mt-2'>
        <?= $error = $errors->getError('name'); ?>
      </div>
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="status_id" class="form-label">Status</label>
    <select name="status_id" class="form-control">
      <option value="1" <?= $customer['status_id'] == 1 ? 'selected' : '' ?>>Aktif</option>
      <option value="2" <?= $customer['status_id'] == 2 ? 'selected' : '' ?>>Tidak Aktif</option>
    </select>
  </div>
  <div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
  </div>
</form>