<h3>List Barang</h3>
<hr/>
<div class="row">
  <div class="col-12 col-xl-5 col-lg-6">
    <form action="/items" method="get" class="mb-2" id="form-search">
      <div class="input-group">
        <span class="input-group-text fw-bold">Cari Barang</span>
        <input type="text" name="search" id="search" placeholder="Masukkan nama barang" class="form-control" autocomplete="off">
        <input type="submit" value="Cari" class="btn btn-primary">
        <a href="/items/new" class="btn btn-outline-secondary">Tambah</a>
      </div>
    </form>
  </div>
</div>

<?php foreach (session()->getFlashdata() as $key => $flash) : ?>
  <div class="alert alert-<?= $key ?>" role="alert">
    <?= $flash ?>
  </div>
<?php endforeach; ?>

<div id="table-result">
  <?= view('items/_items', ['items' => $items]) ?>
</div>

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

    $('#form-search').on("submit", function(event){
      event.preventDefault();

      var form = $(this)
      var actionUrl = form.attr('action');
      $.ajax({
        type: 'get',
        url: actionUrl,
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        data: form.serialize(),
        dataType: 'html',
        success: function(data){
          $("#table-result").html(data)
        },
        error: function(){
          alert("Gagal mencari data")
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

    $("#search").on("keyup", function(){
      var text_search = $(this).val()
      if(text_search.length >= 3 || text_search.length == 0) {
        $("#form-search").trigger("submit")
      }
    })
  })
</script>
