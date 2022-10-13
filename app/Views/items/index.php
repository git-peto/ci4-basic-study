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
        <tr id="item_<?= $item->id ?>">
          <td><?= $index + 1 ?></td>
          <td><img src="/assets/images/<?= $item->image_name ?>" alt="Image for <?= $item->name ?>" width="200px"/></td>
          <td><?= $item->name ?></td>
          <td><?= $item->unit ?></td>
          <td><?= $item->price ?></td>
          <td>
            <form action="/items/delete" method="post" class="form-delete">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="id" value="<?= $item->id ?>" />
              <a href="/items/<?= $item->id ?>" class="btn btn-sm btn-info btn-lihat">Lihat</a>
              <a href="/items/<?= $item->id ?>/edit" class="btn btn-sm btn-warning">Ubah</a>
              <button type="submit" class="btn btn-sm btn-danger btnHapus">Hapus</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

<div class="modal fade" tabindex="-1" id="modal-show-item">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Loading..</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Loading..
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){
    $('.btnHapus').on("click", function(event){
      if(!confirm("Yakin hapus data ini?")){
        event.preventDefault()
      }
    })

    $('.form-delete').on("submit", function(event){
      event.preventDefault()

      var form = $(this)
      var actionUrl = form.attr('action');
      $.ajax({
        type: 'post',
        url: actionUrl,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: form.serialize(),
        dataType: 'json',
        success: function(data){
          if(data.status == 200){
            $("#item_" + data.id).remove()
          } else {
            alert(data.message)
          }
        },
        error: function(){
          alert("Gagal menghapus data")
        },
      })
    })

    $('.btn-lihat').on("click", function(event){
      event.preventDefault()

      var url = $(this).attr('href')
      $("#modal-show-item .modal-title").html('Loading..')
      $("#modal-show-item .modal-body").html('Loading...')
      $("#modal-show-item").modal('show')
      $.ajax({
        type: 'get',
        url: url,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        dataType: 'html',
        success: function(data){
          $("#modal-show-item .modal-title").html('Rincian Barang')
          $("#modal-show-item .modal-body").html(data)
        },
        error: function(){
          alert("Gagal mengambil data")
        },
      })
    })
  })
</script>
