<div class="row">	
	<div class="col-md-9">
	<div class="panel panel-default">
        <div class="panel-heading">
        DAFTAR AKUN
        </div>
        <div class="panel-body">
        <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
						<tr>
							<td align="center"><b>No</b></td>
							<td align="center"><b>Nama Akun</b></td>
							<td align="center"><b>Kode Akun</b></td>
							<td align="center"><b>Posisi Saldo</b></td>
							<td align="center"><b>Action</b></td>
						</tr>
						<?php
							$akun=mysql_query("SELECT * from tb_akun");
							$no=1;
							while($data_akun=mysql_fetch_array($akun)){
								switch($data_akun['kategori']){
									case"":
										$kat="-";
									break;
									case"HL":
										$kat="Harta Lancar";
										$pos="Debet";
									break;
									case"HT":
										$kat="Harta Tetap";
										$pos="Kredit";
									break;							
								}
								
								echo"
									<tr>
										<td align='center'>$no</td>
										<td>$data_akun[nama_akun]</td>
										<td align='center'>$data_akun[kode]</td>
										<td align='center'>$pos</td>
										<td align='center'><a href='$siteurl/lib/controller.php?page=akun&action=delete&id=$data_akun[id]'><button type='button' class='btn btn-danger'>Hapus</button></a></td>
									</tr>
								";
							$no++;
							}
						?>
					</table>
		</div>
        </div>
    </div>
	</div>
<div class="col-md-3">
		<b>TAMBAH AKUN</b><br>
		<form method="POST" action="<?php echo $siteurl;?>/lib/controller.php?page=akun&action=insert">
		Nomor/Kode Akun :
		<input type="text" required name="kode_akun" class="form-control">
		Nama Akun :<br>
		<input type="text" required name="nama_akun" class="form-control">
		Posisi Awal Saldo :<br>
		<select name="kategori" required class="form-control">
			<option value="HL">Debet</option>
			<option value="HT">Kredit</option>
		</select><br>
		<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
		</form>
	</div>
</div>

