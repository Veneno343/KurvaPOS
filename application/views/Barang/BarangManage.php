<div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h2><?php echo $Title; ?></h2>
        <small>Mohon isi data barang dengan lengkap</small>
      </div>

      <div class="box-divider m-a-0"></div>

      <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url('mbarang_c/Submit') ?>" id="form-barang">
          <input type="hidden" name="idbarang" value="<?php echo $id; ?>"></input>
          <?php  
            if($this->uri->segment(2) == 'edit') {
          ?>
          <div class="form-group">
            <label for="">QR Code</label>
            <div class="text-primary" id="qrcode">
            </div>
          </div>
          <?php 
            }
          ?>
          <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nmbarang" class="form-control" placeholder="Masukkan nama barang" value="<?php echo $nama; ?>" required/>
          </div>
          <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="idkategori" id="kategori">
                    <option value="none" selected disabled>- Pilih Kategori - </option>
                    <?php
                      foreach($DataKategori as $Kategori) {
                    ?>
                          <option class='form-control' value=<?php echo $Kategori->id; ?> <?php ($Kategori->id == $idkategori ? 'selected' : '' )?> > <?php echo $Kategori->nama; ?> </option>
                    <?php
                    }
                    ?>  
                </select>
          </div>
          <div class="block-content">
            <input type="hidden" class="form-control" id="rowIndex">
            <table class="table m-b-none" id="data-detail"  width="100%">
              <thead>
                <tr>
                    <th>
                      <div class="form-group">
                      <input type="text" id="ukuran" name="ukuran" class="form-control" placeholder="Masukkan ukuran barang" value="">
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <input type="text" id="warna" name="warna" class="form-control" placeholder="Masukkan warna barang" value="">
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <button type="button" id="tambah-detail" class="btn btn-outline b-success text-success"><i id="savedetail" class="fa fa-plus"></i></button>
                      </div>
                    </th>
                </tr>
                <tr>
                    <th>Ukuran</th>
                    <th>Warna</th>
                    <th>Aksi</th>
                </tr>   
              </thead>
              <tbody>
                <?php 
                  if($this->uri->segment(2) == 'edit') {
                    if($DetailBarang) {
                      foreach($DetailBarang as $Detail) {
                ?>
                <tr>
                  <td><?php echo $Detail->ukuran; ?></td>
                  <td><?php echo $Detail->warna; ?></td>
                  <td>
                    <button type='button' class='btn btn-warning editRow' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil'></i></button>&nbsp;
                    <button type='button' class='btn btn-danger deleteRow' data-toggle='tooltip' title='Delete'><i class='fa fa-trash'></i></button>
                  </td>
                </tr>
                <?php 
                      }
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>

          <input type="hidden" id="detail_value" name="detail_value">
          <button type="submit" id="submitData" name="Simpan" class="btn white m-b">Simpan</button>
        </form>
      </div>
    </div>
</div>


<script>
$(document).ready(function() {
  $('#qrcode').qrcode({width : 128, height : 128, text : "<?php echo $nama; ?>"});

  
  $('#tambah-detail').click(function() {
    var isValid = validate_data();
    if (!isValid) return false;
    
    var rowSelect;  
    var isDuplicate = false;
      
    if ($("#rowIndex").val() != '') {
      var dataContent = "";
      rowSelect = $("#rowIndex").val();
    } else {
      var dataContent = "<tr>";
      $('#data-detail tbody tr').filter(function() {
        var $dataCell = $(this).children('td');

        if ($dataCell.eq(0).text() === $("#ukuran").val && $dataCell.eq(1).text() === $("#warna").val()) {          
          alert("Maaf,ukuran " + $("#ukuran").val() + " dan warna " + $("#warna").val() + " sudah ada");
          
          isDuplicate = true;

          return false;
        } 
      });
    }

    if (isDuplicate == false) {
      dataContent += "<td>" + $("#ukuran").val() + "</td>";
      dataContent += "<td>" + $("#warna").val() + "</td>";
      dataContent += "<td><button type='button' class='btn btn-warning editRow' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil'></i></button>&nbsp;";
      dataContent += "<button type='button' class='btn btn-danger deleteRow' data-toggle='tooltip' title='Hapus'><i class='fa fa-trash'></i></button></td>";
      
      if($("#rowIndex").val() != '') {
        $('#data-detail tbody tr:eq(' + rowSelect + ')').html(dataContent);
        $("#rowIndex").val('');
      } else {
        dataContent += "</tr>";
        $('#data-detail tbody').append(dataContent);
      }

      clear_data();
    }
  });
  
  $(document).on('click', '.editRow', function() {
    $("#rowIndex").val($(this).closest('tr')[0].sectionRowIndex);

    $("#ukuran").val($(this).closest('tr').find("td:eq(0)").html());
    $("#warna").val($(this).closest('tr').find("td:eq(1)").html());

    return false;
  });

  $(document).on('click', '.deleteRow', function() {
    if(confirm("Hapus data yang dipilih?") == true) {
      $(this).closest('td').parent().remove();
    }

    return false;    
  });

  function clear_data(){
    $('#ukuran').val('');
    $('#warna').val('');
  }

  function validate_data(){
    if($('#ukuran').val() == "" || $('#warna').val() == "") {
      alert("Tolong isi kolom ukuran dan warna");
      return false;
    }

    return true;
  }

  $("#form-barang").submit(function(e) {
    var form = this;

    var detail_table = $('table#data-detail tbody tr').get().map(function(row) {
      return $(row).find('td').get().map(function(cell) {
        return $(cell).html();
      });
    });

    $("#detail_value").val(JSON.stringify(detail_table));

    alert('Berhasil menyimpan data!');
  });
  
});
</script>