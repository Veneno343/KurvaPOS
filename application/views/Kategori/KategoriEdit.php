<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2>Edit Kategori</h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>

        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('Mkategori_c/SubmitEdit') ?>">
            <?php
              if($DataKategori) {
            ?>
            <input type="hidden" name="idkategori" value="<?php echo $DataKategori->id; ?>"/>
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="nmkategori" class="form-control" placeholder="Masukkan nama kategori" value="<?php echo $DataKategori->nama; ?>" required/>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="ktkategori" class="form-control" placeholder="Deskripsi" value="<?php echo $DataKategori->keterangan; ?>" required/>
            </div>
            <?php
            }
            ?>
            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>