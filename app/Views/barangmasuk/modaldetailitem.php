<!-- Modal -->
<div class="modal fade" id="modalitem" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode Barang</td>
                        <td>Nama Barang</td>
                        <td>Harga Masuk</td>
                        <td>Harga Jual</td>
                        <td>Jumlah</td>
                        <td>Sub. Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $nomor = 1;
                    foreach ($tampildatadetail->getResultArray() as $row):
                    ?>
                    <tr>
                        <td><?= $nomor++;?></td>
                        <td><?= $row['detbrgkode'];?></td>
                        <td><?= $row['brgnama'];?></td>
                        <td style="text-align: right;"> <?= number_format($row['dethargamasuk'],0,",",".") ?></td>
                        <td style="text-align: right;"> <?= number_format($row['dethargajual'],0,",",".") ?></td>
                        <td style="text-align: center;"> <?= number_format($row['detjml'],0,",",".") ?></td>
                        <td style="text-align: right;"> <?= number_format($row['detsubtotal'],0,",",".") ?></td>
                        
                    </tr>
                    <?php endforeach;?>
                </tbody>

            </table>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


