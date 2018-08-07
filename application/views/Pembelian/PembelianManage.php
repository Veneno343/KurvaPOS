<div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h2><?php echo $Title; ?></h2>
        <small>Mohon isi data barang dengan lengkap</small>
      </div>

      <div class="box-divider m-a-0"></div>

      <div class="box-body">
        <form role="form" method="post" action="<?php echo base_url('tpembelian_c/Submit') ?>" id="form-pembelian">
          <input type="hidden" name="idpembelian" value="<?php echo $id; ?>"></input>
          <?php  
            if($this->uri->segment(2) == 'edit') {
          ?>
          <div class="form-group">
            <label>No Pembelian</label>
            <input type="text" name="nopembelian" class="form-control" value="<?php echo $nopembelian; ?>" disabled required/>
          </div>
          <?php 
            }
          ?>
          <div class="form-group">
            <label for="">Tanggal</label>
            <div class='input-group date' data-ui-jp="datetimepicker" data-ui-options="{
                  format: 'YYYY/MM/DD',
                  icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-screenshot',
                    clear: 'fa fa-trash',
                    close: 'fa fa-remove'
                  }
                }">
                <input type='text' name="tanggal" class="form-control" value="<?php echo $tanggal; ?>" required/>
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
          </div>

          <div class="form-group">
                <label>Supplier</label>
                <select class="form-control" name="idsupplier" id="supplier">
                    <option value="none" selected disabled>- Pilih Supplier - </option>
                    <?php
                      foreach($DataSupplier as $Supplier) {
                          echo "<option class='form-control' value=".$Supplier->id.">".$Supplier->nama."</option>";
                      }
                    ?>
                </select>
          </div>
          <div class="form-group">
                <label>Gudang</label>
                <select class="form-control" name="idgudang" id="gudang">
                    <option value="none" selected disabled>- Pilih Gudang - </option>
                    <?php
                      foreach($DataGudang as $Gudang) {
                          echo "<option class='form-control' value=".$Gudang->id.">".$Gudang->nama."</option>";
                      }
                    ?>
                </select>
          </div>
          
          <div class="block-content">
            <input type="hidden" class="form-control" id="rowIndex">
            <table class="table m-b-none" id="data-detail"  width="100%">
              <thead>
                <tr>
                    <th>Barang</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <th>
                      <div class="form-group">
                          <select class="form-control" name="barangid" id="barangid">
                              <option value="none" selected disabled>- Pilih Barang - </option>
                              <?php
                                foreach($DataBarang as $Barang) {
                                    echo "<option class='form-control' value=".$Barang->idbrg.">".$Barang->namabrg."</option>";
                                }
                              ?>
                              <input type="hidden" id="namabarang">
                          </select>
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                          <select class="form-control" name="nmwarna" id="nmwarna">
                              <option value="none" selected disabled>- Pilih Warna - </option>
                          </select>
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                          <select class="form-control" name="nmukuran" id="nmukuran">
                              <option value="none" selected disabled>- Pilih Ukuran - </option>
                          </select>
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <input type="text" id="hgbarang" name="hgbarang" class="form-control" placeholder="Masukkan harga" value="">
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <input type="text" id="qtbarang" name="qtbarang" class="form-control" placeholder="Masukkan kuantitas" value="">
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <input type="text" id="totalharga" name="totalharga" class="form-control" placeholder="Total Harga" value="">
                      </div>
                    </th>
                    <th>
                      <div class="form-group">
                      <button type="button" id="tambah-detail" class="btn btn-outline b-success text-success"><i id="savedetail" class="fa fa-plus"></i></button>
                      </div>
                    </th>
                </tr>   
              </thead>
              <tbody>
                <?php 
                  if($this->uri->segment(2) == 'edit') {
                    if($DetailPembelian) {
                      foreach($DetailPembelian as $Detail) {
                ?>
                <tr>
                  <td style="display:none"><?php echo $Detail->idbarang; ?></td>
                  <td width="15%"><?php echo $Detail->namabarang; ?></td>
                  <td width="10%"><?php echo $Detail->warna; ?></td>
                  <td width="10%"><?php echo $Detail->ukuran; ?></td>
                  <td width="15%"><?php echo $Detail->harga; ?></td>
                  <td width="10%" class="qtbarang"><?php echo $Detail->kuantitas; ?></td>
                  <td width="15%" class="totalharga"><?php echo $Detail->total; ?></td>
                  <td width="15%">
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
      </div>
      
      <div class="box-divider m-a-0"></div>

      <div class="box-body">
            <div class="col-md-6">
              Total Keseluruhan : Rp
              <input class="form-control" name="totalsemua" id="totalsemua" value="">
            </div>
            <div class="col-md-6">
              Total Barang :
              <input class="form-control" name="totalbarang" id="totalbarang" value="">
            
            <br>
            <input type="hidden" id="detail_value" name="detail_value">
            </div>
            <button type="submit" id="submitData" name="Simpan" class="btn white m-b">Simpan</button>
            
          </form>
        </div>
      </div>
</div>



<script>
$(document).ready(function() {

  var totalsemua = 0;
  var totalbarang = 0;

  function SumTotalHarga() {
    $(".totalharga").each(function() {
      var value = $(this).text();
      totalsemua += parseInt(value);
    });
  }

  function SumTotalBarang() {
    $(".qtbarang").each(function() {
      var value = $(this).text();
      totalbarang += parseInt(value);
    });
  }

  function LoadHarga() {
    SumTotalBarang();
    SumTotalHarga();
    
    $("#totalsemua").val(totalsemua);
    $("#totalbarang").val(totalbarang);
  }

  LoadHarga();

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
      dataContent += "<td style='display:none'>" + $("#barangid").val() + "</td>";
      dataContent += "<td style='width:10%'>" + $("#namabarang").val() + "</td>";
      dataContent += "<td style='width:10%'>" + $("#nmwarna").val() + "</td>";
      dataContent += "<td style='width:10%'>" + $("#nmukuran").val() + "</td>";
      dataContent += "<td style='width:10%'>" + $("#hgbarang").val() + "</td>";
      dataContent += "<td style='width:10%' class='qtbarang'>" + $("#qtbarang").val() + "</td>";
      dataContent += "<td style='width:10%' class='totalharga'>" + $("#totalharga").val() + "</td>";
      dataContent += "<td style='width:10%'><button type='button' class='btn btn-outline b-warning text-warning editRow' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil'></i></button>&nbsp;";
      dataContent += "<button type='button' class='btn btn-outline b-danger text-danger deleteRow' data-toggle='tooltip' title='Hapus'><i class='fa fa-trash'></i></button></td>";
      
      if($("#rowIndex").val() != '') {
        $('#data-detail tbody tr:eq(' + rowSelect + ')').html(dataContent);
        $("#rowIndex").val('');
      } else {
        dataContent += "</tr>";
        $('#data-detail tbody').append(dataContent);
      }

      clear_data();
      
      totalsemua = 0;
      totalbarang = 0;
      SumTotalHarga();
      SumTotalBarang();
      $("#totalsemua").val(totalsemua);
      $("#totalbarang").val(totalbarang);
    }
  });
  
  $(document).on('click', '.editRow', function() {
    $("#rowIndex").val($(this).closest('tr')[0].sectionRowIndex);
    
    $("#barangid").val($(this).closest('tr').find("td:eq(0)").html());
    $("#warna").val($(this).closest('tr').find("td:eq(2)").html());
    $("#ukuran").val($(this).closest('tr').find("td:eq(3)").html());
    $("#hgbarang").val($(this).closest('tr').find("td:eq(4)").html());
    $("#qtbarang").val($(this).closest('tr').find("td:eq(5)").html());
    $("#totalharga").val($(this).closest('tr').find("td:eq(6)").html());
    
    
    return false;
  });

  $(document).on('click', '.deleteRow', function() {
    if(confirm("Hapus data yang dipilih?") == true) {
      $(this).closest('td').parent().remove();
      
      totalsemua = 0;
      totalbarang = 0;
      SumTotalHarga();
      SumTotalBarang();
      $("#totalsemua").val(totalsemua);
      $("#totalbarang").val(totalbarang);
    }

    return false;    
  });

  function clear_data(){
    $('#hgbarang').val('');
    $('#qtbarang').val('');
    $('#totalharga').val('');
    
  }

  function validate_data(){
    if($('#ukuran').val() == "" || $('#warna').val() == "") {
      alert("Tolong isi kolom ukuran dan warna");
      return false;
    }

    return true;
  }

  $("#form-pembelian").submit(function(e) {
    var form = this;

    var detail_table = $('table#data-detail tbody tr').get().map(function(row) {
      return $(row).find('td').get().map(function(cell) {
        return $(cell).html();
      });
    });

    $("#detail_value").val(JSON.stringify(detail_table));

    alert('Berhasil menyimpan data!');
  });

  $("#barangid").change(function() {
    $("#namabarang").val(this.options[this.selectedIndex].text);
    
    $.ajax({
      type : "POST",
      url : "<?php echo base_url('tpembelian_c/getWarnaBarang/');?>" + $("#barangid").val(),
      dataType : "JSON",

      success : function(response) {
        $("#nmwarna").html(response.list_warna).show();
      },

      error : function (  xhr,ajaxOptions,thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }

    });
  });

  $("#nmwarna").change(function() {
    $.ajax({
      type : "POST",
      url : "<?php echo base_url('tpembelian_c/getUkuranBarang'); ?>",
      data : {'idbarang' : $("#barangid").val() , 'nmwarna' : $("#nmwarna").val()},
      dataType : "JSON",

      success : function(response) {
        $("#nmukuran").html(response.list_ukuran).show();
      },

      error : function (xhr,ajaxOptions,thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
  });

  $("#hgbarang,#qtbarang").keyup(function(){
    total = $("#hgbarang").val()*$("#qtbarang").val();
    $("#totalharga").val(total);
  });

});
</script>