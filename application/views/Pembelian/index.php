<div class="col-md-12 col-sm-12">
    <div class="box">
    <div class="box-header">
      <h2>Daftar Pembelian</h2>
      <small>Berikut adalah daftar barang.<br><a href="<?php echo base_url('tpembelian_c/Tambah') ?>"><i class="fa fa-plus-square">&nbsp;Klik di sini untuk menambahkan</i></a></small>
    </div>
    <div class="box-body">
      Cari : <input id="filter" type="text" class="form-control input-sm w-auto inline m-r"/>
    </div>
    <table class="table m-b-none" data-ui-jp="footable" data-filter="#filter" data-page-size="5">
        <thead>
          <tr>
              <th data-toggle="true">
                  No.
              </th>
              <th>
                  No Transaksi
              </th>
              <th data-hide="phone,tablet">
                  Tanggal
              </th>
              <th>
                  Supplier
              </th>
              <th>
                  Gudang
              </th>
              <th>
                  Total Barang
              </th>
              <th>
                  Total Pembelian
              </th>
              <th>
                  Aksi
              </th>
          </tr>
        </thead>
        <tbody>
            
        <?php 
        $num = 1;
        foreach($DataPembelian as $Pembelian) { ?>
          <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $Pembelian->nop; ?></td>
              <td><?php echo $Pembelian->tgl; ?></td>
              <td><?php echo $Pembelian->supplier; ?></td>
              <td><?php echo $Pembelian->gudang; ?></td>
              <td><?php echo $Pembelian->totalbrg; ?></td>
              <td><?php echo $Pembelian->totalharga; ?></td>
              <td>
                  <a href="<?php echo base_url('tpembelian_c/edit/').$Pembelian->id; ?>" id="editPembelian" class="btn btn-outline rounded b-warning text-warning"><i class="fa fa-pencil"></i></a>
                  <a onclick="return confirm('Hapus data?');" href="<?php echo base_url('tpembelian_c/hapus/').$Pembelian->id; ?>" id="hapusPembelian" class="btn btn-outline rounded b-danger text-danger"><i class="fa fa-trash"></i></a>
              </td>
          </tr>
        <?php 
        ++$num;
        }
        ?>
        </tbody>
        <tfoot class="hide-if-no-paging">
          <tr>
              <td colspan="5" class="text-center">
                  <ul class="pagination"></ul>
              </td>
          </tr>
        </tfoot>
      </table>
  </div>
</div>