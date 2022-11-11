<h3>Tambah Sale</h3>

<a href="/sales" class="btn btn-sm btn-primary mb-2">List Sale</a>

<form action="/sales" method="post">
  <div class="mb-3">
    <label for="invoice_no" class="form-label">Invoice No.</label>
    <input type="text" name="invoice_no" id="invoice_no" class="form-control" value="<?= set_value('invoice_no') ?>">
  </div>
  <div class="mb-3">
    <label for="invoice_date" class="form-label">Invoice Date</label>
    <input type="text" name="invoice_date" id="invoice_date" class="form-control" value="<?= set_value('invoice_date') ?>">
  </div>
  <div class="mb-3">
    <label for="customer_id" class="form-label">Customer ID</label>
    <input type="text" name="customer_id" id="customer_id" class="form-control" value="<?= set_value('customer_id') ?>">
  </div>
  <div class="mb-3">
    <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
</form>

<script>
  $('#invoice_date').datepicker();
</script>