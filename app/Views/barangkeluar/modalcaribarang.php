 <!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- Modal -->
<div class="modal fade" id="modalcaribarang" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Data Cari Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table id="databarang" class="table table-bordered table-striped dataTable dtr-inline collapsed" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok </th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- untuk memilih salah satu barang  -->
<script>
    function pilih(kode){
        $('#kodebarang').val(kode);
        $('#modalcaribarang').on('hidden.bs.modal', function (event) {
            ambilDataBarang()
});
        $('#modalcaribarang').modal('hide');

    }
</script>

<!-- untuk menampilkan list data pelanggan  -->
<script>
    function listDataBarang() { 
        var table = $('#databarang').DataTable({
            destroy:true,
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                "url":"<?= base_url() ?>/barangkeluar/listDataBarang",
                "type":"POST",
            },
            "columnDefs":[{
                "targets":[0,5],
                "orderable":false,
            }]
        })
     }
</script>

<script>
    $(document).ready(function () {
        listDataBarang();
    });
</script>