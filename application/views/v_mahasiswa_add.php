    <!-- Content Header (Page header) -->
	<div class="content-header">
   	<div class="container-fluid">
   		<div class="row mb-2">
   			<div class="col-sm-6">
   				<h1 class="m-0">Add Mahasiswa</h1>
   			</div><!-- /.col -->
   			<div class="col-sm-6">
   				<ol class="breadcrumb float-sm-right">
   					<li class="breadcrumb-item"><a href="#">Home</a></li>
   					<li class="breadcrumb-item active">Mahasiswa</li>
   				</ol>
   			</div><!-- /.col -->
   		</div><!-- /.row -->
   	</div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <section class="content">
   	<div class="container-fluid">
   		<div class="row">
   			<div class="col-lg-12">

   				<div class="card card-outline card-info">
   					<div class="card-header">
					Form Mahasiswa
					</div>
   					<div class="card-body">			
				<form class="form-horizontal" action="<?php echo base_url('mahasiswa/create');?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">

						<div class="form-group">
							<label class="col-sm-12 control-label">Nama Mahasiswa</label>
							<div class="col-sm-12">
								<input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Lengkap Mahasiswa" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12 control-label">Nomor Induk Mahasiswa</label>
							<div class="col-sm-12">
								<input type="text" name="nim_mahasiswa" class="form-control" placeholder="NIM" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-12 control-label">Fakultas</label>
							<div class="col-sm-12">
								<select class="form-control" id="selectfakultas" style="width:100%">
								
								<option value="">Pilih</option>
										<?php
										foreach($fakultas as $fak): // Lakukan looping pada variabel dari controller
											?>
											<option value='<?php echo$fak->kode_fakultas;?>'><?php echo $fak->nama_fakultas;?></option>;
										<?php
										endforeach;
										?>
								</select>	
							</div>
						</div>
						<div class="form-group">
							<label for="Prodi" class="col-sm-12 control-label">Program Studi</label>
							<div class="col-sm-12">
								
							<select class="selectprodi form-control" name="kode_prodi" id="prodi" required>
							<option value="">Pilih</option>
							</select>
							
							<div id="loading" style="margin-top: 15px;">
								 <small>Loading...</small>
							</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Tanggal Lahir</label>
							<div class="col-sm-12">
								<input type="text" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-12 control-label">No Hp/Telp</label>
							<div class="col-sm-12">
								<input type="text" name="no_hp" class="form-control" placeholder="No HP" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-12 control-label">Alamat</label>
							<div class="col-sm-12">
								<input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
							</div>
						</div>

						<div class="form-group">
							<label for="Upload" class="col-sm12 control-label">Upload Foto (jpg,jpeg,png)</label>
							<div class="col-sm-12">
								<input type="file" id="foto" name="foto" required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
					</div>
				</form>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div><!-- /.container-fluid -->
   </section> 
   <!-- /.content -->
   
  <script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#selectfakultas").change(function(){ // Ketika user mengganti atau memilih data fakultas
      $("#prodi").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("mahasiswa/listProdi"); ?>", // Isi dengan url/path file php yang dituju
        data: {kode_fakultas : $("#selectfakultas").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya
          // set isi dari combobox prodi
          // lalu munculkan kembali combobox prodi
          $("#prodi").html(response.list_prodi).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>
