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

      <table id="datapelanggan" class="table table-bordered table-striped dataTable dtr-inline collapsed" style="width:100%">
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
<!-- untuk menampilkan list data pelanggan  -->
<script>
    function listDataPelanggan() { 
        var table = $('#datapelanggan').DataTable({
            destroy:true,
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

<!-- untuk pilih salah satu data pelanggan  -->
<script>
function pilih(id,nama){
    $('#namapelanggan').val(nama);
    $('#idpelanggan').val(id);

    $('#modaldatapelanggan').modal('hide');
}
</script>
<!-- untuk hapus pelanggan data  -->
<script>
    function hapus(id,nama){
        Swal.fire({
        title: 'Hapus Pelanggan?',
        text: "Yakin menghapus data pelanggan dengan nama "+nama+ " ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "/pelanggan/hapus",
                data: {
                    id:id 
                }, 
                dataType: "json",
                success: function (response) {
                    if(response.sukses){
                        Swal.fire(
                        'Berhasil!',
                        response.sukses,
                        'success'
                        )
                        listDataPelanggan();
                    }
                },error:function(xhr,ajaxOptions, thrownError){
                alert(xhr.status + '\n' + thrownError)
                console.log(xhr.status + '\n' + thrownError)
            }
            });
        }
        })
    }
   
</script>

<script>
    $(document).ready(function () {
        listDataPelanggan();
    });
</script>