<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2>Tambah Pengguna</h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>

        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('mpengguna_c/SubmitBaru') ?>">
            
            <div class="form-group">
              <label>Nama Pengguna</label>
              <input type="text" name="nmpengguna" class="form-control" placeholder="Masukkan nama pengguna" required/>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="userpengguna" class="form-control" placeholder="Alamat" required/>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="passpengguna" class="form-control" placeholder="Password" required/>
            </div>

            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>