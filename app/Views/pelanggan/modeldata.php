 <!-- DataTables -->
 <link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<!-- DataTables  & Plugins -->
<script src="<?= base_url()?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


  <!-- Modal -->
<div class="modal fade" id="modaldatapelanggan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cari Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <table id="datapelanggan" class="table table-bordered table-striped dataTable dtr-inline collapsed">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Telp/HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
      </table>
      </div>
    </div>
</div>
</div>

<script>
    function listDataPelanggan() { 
        var table = $('#datapelanggan').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                "url":"/pelanggan/listData",
                "type":"POST",
            },
            "columnDefs":[{
                "targets":[0],
                "orderable":false,
            }]
        })
     }
</script>

<script>
    $(document).ready(function () {
        listDataPelanggan();
    });
</script>