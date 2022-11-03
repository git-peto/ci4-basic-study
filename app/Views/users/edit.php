<h3>Ubah User</h3>

<a href="/users" class="btn btn-sm btn-primary mb-2">List User</a>

<form action="/users/<?= $user['id'] ?>" method="post">
  <input type="hidden" name="_method" value="PUT" />
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="<?= $user['name'] ?>">
    <?php if (isset($errors) and $errors->getError('name')) { ?>
      <div class='text-danger mt-2'>
        <?= $error = $errors->getError('name'); ?>
      </div>
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?= $user['email'] ?>">
    <?php if (isset($errors) and $errors->getError('email')) { ?>
      <div class='text-danger mt-2'>
        <?= $error = $errors->getError('email'); ?>
      </div>
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" id="password" class="form-control" value="<?= $user['password'] ?>">
    <?php if (isset($errors) and $errors->getError('password')) { ?>
      <div class='text-danger mt-2'>
        <?= $error = $errors->getError('password'); ?>
      </div>
    <?php } ?>
  </div>
  <div class="mb-3">
    <label for="status_id" class="form-label">Status</label>
    <select name="status_id" class="form-control">
      <option value="1" <?= $user['status_id'] == 1 ? 'selected' : '' ?>>Aktif</option>
      <option value="2" <?= $user['status_id'] == 2 ? 'selected' : '' ?>>Tidak Aktif</option>
    </select>
  </div>
  <div class="mb-3">
    <input type="submit" value="Perbarui" class="btn btn-primary">
  </div>
</form>