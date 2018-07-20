<div class="col-md-12 col-sm-12">
    <div class="box">
    <div class="box-header">
      <h2>Daftar Pengguna</h2>
      <small>Berikut adalah daftar pengguna<br><a href="<?php echo base_url('mpengguna_c/Tambah') ?>"><i class="fa fa-plus-square">&nbsp;Klik di sini untuk menambahkan</i></a></small>
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
              <th>
                  Username
              </th>
              <th>
                  Password
              </th>
              <th>
                  Aksi
              </th>
          </tr>
        </thead>
        <tbody>
            
        <?php 
        $num = 1;
        if ($DataPengguna) {
            foreach($DataPengguna as $Pengguna) {
        ?>
          <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $Pengguna->nama; ?></td>
              <td><?php echo $Pengguna->username; ?></td>
              <td><?php echo $Pengguna->password; ?></td>
              <td>
                  <a href="<?php echo base_url('mpengguna_c/Edit/'.$Pengguna->id); ?>" id="editPengguna" class="btn btn-outline rounded b-warning text-warning"><i class="fa fa-pencil"></i></a>
                  <a onclick="return confirm('Hapus data yang dipilih?')" href="<?php echo base_url('mpengguna_c/Hapus/'.$Pengguna->id); ?>" id="hapusPengguna" class="btn btn-outline rounded b-danger text-danger"><i class="fa fa-trash"></i></a>    
            </td>
          </tr>
        <?php 
            ++$num;
            }
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