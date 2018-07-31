<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2><?php echo $Title; ?></h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>

        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('mkategori_c/Submit') ?>">
            <input type="hidden" name="idkategori" value="<?php echo $id; ?>" >
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="nmkategori" class="form-control" placeholder="Masukkan nama kategori" value="<?php echo $nama; ?>" required/>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ktkategori" class="form-control" placeholder="Deskripsi" value="<?php echo $keterangan; ?>"  required/>
            </div>

            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>