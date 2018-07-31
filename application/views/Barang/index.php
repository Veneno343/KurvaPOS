<div class="col-md-12 col-sm-12">
    <div class="box">
    <div class="box-header">
      <h2>Daftar Barang</h2>
      <small>Berikut adalah daftar barang.<br><a href="<?php echo base_url('mbarang_c/Tambah') ?>"><i class="fa fa-plus-square">&nbsp;Klik di sini untuk menambahkan</i></a></small>
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
                  Nama
              </th>
              <th data-hide="phone,tablet">
                  Kategori
              </th>
              <th>
                  Aksi
              </th>
          </tr>
        </thead>
        <tbody>
            
        <?php 
        $num = 1;
        foreach($DataBarang as $Barang) { ?>
          <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $Barang->namabrg; ?></td>
              <td><?php echo $Barang->katbrg; ?></td>
              <td>
                  <a href="<?php echo base_url('mbarang_c/edit/').$Barang->idbrg; ?>" id="editBarang" class="btn btn-outline rounded b-warning text-warning"><i class="fa fa-pencil"></i></a>
                  <a onclick="return confirm('Hapus data?');" href="<?php echo base_url('mbarang_c/hapus/').$Barang->idbrg; ?>" id="hapusBarang" class="btn btn-outline rounded b-danger text-danger"><i class="fa fa-trash"></i></a>
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