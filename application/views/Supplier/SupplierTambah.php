<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2>Tambah Supplier</h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>

        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('MSupplier_C/SubmitBaru') ?>">
            
            <div class="form-group">
              <label>Nama Supplier</label>
              <input type="text" name="nmsupplier" class="form-control" placeholder="Masukkan nama supplier" required/>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="adrsupplier" class="form-control" placeholder="Alamat supplier" required/>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="telpsupplier" class="form-control" placeholder="No Telepon (+62/08xxxx)" required/>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="emailsupplier" class="form-control" placeholder="Email aktif" required/>
            </div>

            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>