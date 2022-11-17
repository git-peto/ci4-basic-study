<h3>Detail Sale</h3>

<a href="/sales" class="btn btn-sm btn-primary mb-2">List Sale</a>

<table class="table table-hover table-bordered">
  <tbody>
    <tr>
      <th width="20%">Invoice No</th>
      <td><?= $sale['invoice_no'] ?></td>
    </tr>
    <tr>
      <th width="20%">Invoice Date</th>
      <td><?= $sale['invoice_date'] ?></td>
    </tr>
    <tr>
      <th width="20%">Customer ID</th>
      <td><?= $sale['customer_id'] ?></td>
    </tr>
    <tr>
      <th width="20%">Grand Total</th>
      <td><?= thousand_separator($sale['grand_total']) ?></td>
    </tr>
    <tr>
      <th width="20%">User ID</th>
      <td><?= $sale['user_id'] ?></td>
    </tr>
  </tbody>
</table>

<button type="button" class="btn btn-sm btn-warning mb-2" data-bs-toggle="modal" data-bs-target="#modal-add-sale-item">
  Tambah Sale Item
</button>

<table class="table table-hover table-bordered">
  <thead>
    <th>No</th>
    <th>Item</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Subtotal</th>
  </thead>
  <tbody>
    <?php foreach($sale_items as $index => $sale_item): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $sale_item->item_name ?></td>
        <td><?= $sale_item->quantity ?></td>
        <td><?= thousand_separator($sale_item->price) ?></td>
        <td><?= thousand_separator($sale_item->subtotal) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="modal fade" tabindex="-1" id="modal-add-sale-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Sale Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/saleitems" method="post">
          <div class="mb-3">
            <label for="item_id" class="form-label">Item ID</label>
            <input type="text" name="search_item" id="search_item" class="form-control">
            <input type="hidden" name="item_id" id="item_id" class="form-control" value="<?= set_value('item_id') ?>">
            <input type="hidden" name="sale_id" id="sale_id" class="form-control" value="<?= $sale['id'] ?>">
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" name="quantity" id="quantity" class="form-control" value="<?= set_value('quantity') ?>">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="<?= set_value('price') ?>">
          </div>
          <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <input type="text" name="subtotal" id="subtotal" class="form-control" value="<?= set_value('subtotal') ?>" readonly>
          </div>
          <div class="mb-3">
            <input type="submit" value="Simpan" class="btn btn-primary">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function(){
    $('#search_item').autocomplete({
      source: "<?= site_url('items/get_autocomplete') ?>",
      select: function(event, ui){
        $('#item_id').val(ui.item.id);
      }
    })

    $('#quantity, #price').on('keyup', function(e){
      var $subtotal = $('#subtotal')
      var $quantity = $('#quantity')
      var $price = $('#price')
      var subtotal = parseInt($quantity.val()) * parseInt($price.val())
      $subtotal.val(subtotal)
    })
  })
</script>