<div class="col-md-8">
      <div class="box">
        <div class="box-header">
          <h2>Tambah Barang</h2>
          <small>Mohon isi data barang dengan lengkap</small>
        </div>

        <div class="box-divider m-a-0"></div>

        <div class="box-body">
          <form role="form" method="post" action="<?php echo base_url('Inventory_C/SubmitBarangBaru') ?>">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nmbarang" class="form-control" placeholder="Masukkan nama barang" required/>
            </div>

            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control" name="idkategori" id="">
                  <?php
                    foreach($DataKategori as $Kategori) {
                        echo "<option class='form-control' value=".$Kategori->id.">".$Kategori->nama."</option>";
                    }
                  ?>
              </select>
            </div>

            <div>
              <button type="button" id="tambah-detail" class="btn btn-outline b-success text-success"><i class="fa fa-plus"></i></button>
              <div class="form-group col-md-4">
                <input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Masukkan ukuran barang">
              </div>
              <div class="form-group col-md-4">
                <input type="text" id="warna" name="warna" class="form-control" placeholder="Masukkan warna barang">
              </div>

            </div>
            <table class="table m-b-none" id="data-detail" data-ui-jp="footable" data-page-size="5">
              <thead>
                <tr>
                  <th id="No">No.</th>
                  <th id="ukuranbrg">Ukuran</th>
                  <th id="warnabrg">Warna</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            <button type="submit" name="Simpan" class="btn white m-b">Simpan</button>
          </form>
        </div>
      </div>
</div>
    <script>
    $(document).ready(function() {
      
      var table_length;

      
      function set_number(){
        var table_length = $('#data-detail tbody tr').length+1;
        $("#No").val(table_length);
      }

      function clear_data(){
        $('#ukuran').val('');
        $('#warna').val('');
      }

      $('#tambah-detail').click(function() {
        set_number();
        var no = $('#No').val();
        var ukuran = $('#ukuran').val();
        var warna = $('#warna').val();

        if (ukuran == "" || warna =="") {
          alert("Tolong isi kolom ukuran dan warna");
        } else {
          $('#data-detail tbody:last-child').append (
          '<tr>' + 
            '<td>' + no + '</td>' + 
            '<td>' + ukuran + '</td>' +
            '<td>' + warna + '</td>' +
            '<td><button type="button" class="btn btn-outline b-danger text-danger deleteRow"><i class="fa fa-trash"></i></button></td>' + 
          '</tr>'
          )
          clear_data();
        }        
      });
      
      $(document).on('click', '.deleteRow', function() {
        $(this).closest('tr').remove();
      })
      
    });
    </script>