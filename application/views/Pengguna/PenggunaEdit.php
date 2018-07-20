<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2>Edit Pengguna</h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>
        <?php
          if($DataPengguna) {
        ?>
        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('Mpengguna_C/SubmitEdit') ?>">
            <input type="hidden" name="idpengguna" value="<?php echo $DataPengguna->id; ?>">
            <div class="form-group">
              <label>Nama Pengguna</label>
              <input type="text" name="nmpengguna" class="form-control" placeholder="Masukkan nama pengguna" value="<?php echo $DataPengguna->nama; ?>" required/>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="userpengguna" class="form-control" placeholder="Alamat pengguna" value="<?php echo $DataPengguna->username; ?>" required/>
          </div>
            <?php
            }
            ?>
            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>