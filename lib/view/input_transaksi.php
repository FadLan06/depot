<?php
 date_default_timezone_set('Asia/Jakarta');
?>
<div class="row">
<div class="col-md-9">
<div class="panel panel-default">
        <div class="panel-heading">
        JURNAL UMUM
        </div>
        <div class="panel-body">
        <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
						<tr>
							<td align="center" style="padding:10px;"><b>No</b></td>
							<td align="center" style="padding:10px;"><b>Tanggal Transaksi</b></td>
							<td align="center" style="padding:10px;"><b>Akun</b></td>
							<td align="center" style="padding:10px;"><b>Debet</b></td>
							<td align="center" style="padding:10px;"><b>Kredit</b></td>
							<td align="center" style="padding:10px;"><b>Action</b></td>
						</tr>
						<?php
							$by_tgl=mysql_query("SELECT *, tb_jurnal.id 'idjurnal', tb_akun.id 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id group by tgl order by tb_jurnal.tgl ASC");
							$no=1;
							$total_debet	=	0;
							$total_kredit	=	0;
							$all_debet		=	0;
							$all_kredit		=	0;
							while($data=mysql_fetch_array($by_tgl)){
								echo"
								<tr>
									<td align='center'>$no</td>
									<td>$data[tgl]</td>
									<td></td>
									<td></td>
									<td></td>
								</tr>";
								
							$transaksi=mysql_query("SELECT *, tb_jurnal.id 'idjurnal' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.tgl='$data[tgl]' order by tb_jurnal.id ASC");
							$total_debet	=	0;
							$total_kredit	=	0;
							while($v=mysql_fetch_array($transaksi)){
								
								switch($v['tipe']){
									case"D":
										$akun				=	"<p>$v[nama_akun]</p>";
										$kolom_debet	=	$v['nominal'];
										$kolom_kredit	=	"0";
										$total_debet		+=	$kolom_debet;
										
									break;
									
									case"K":
										$akun				=	"<p style='margin-left:10px;'>$v[nama_akun]</p>";
										$kolom_kredit	=	$v['nominal'];
										$kolom_debet	=	"0";
										$total_kredit		+=	$kolom_kredit;

									break;
								}
								
								echo"
									<tr>
										<td align='center'></td>
										<td></td>
										<td>$akun</td>
										<td align='center'><p align='right'>Rp. ".number_format($kolom_debet,0,",",".")."</p></td>
										<td align='center'><p align='right'>Rp. ".number_format($kolom_kredit,0,",",".")."</p></td>
										<td align='center'><a href='$siteurl/lib/controller.php?page=transaksi&action=hapus_transaksi&id=$v[idjurnal]'><button type='button' class='btn btn-danger'>Hapus</button></a></td>
									</tr>
								";
								

							
							}
							/*echo"
																
									<tr>
										<td colspan='3' align='center'  style='padding:10px;'>JUMLAH</td>
										<td align='right'>Rp. ".number_format($total_debet,0,",",".")."</td>
										<td align='right'>Rp. ".number_format($total_kredit,0,",",".")."</td>
									</tr>
							";*/
								$no++;
								$all_debet	+=	$total_debet;
								$all_kredit +=	$total_kredit;
															
							}

							echo"
									<tr>
										<td colspan='3' align='center'><b>TOTAL</b></td>
										<td align='center'><b>Rp. ".number_format($all_debet,0,",",".")."</b></td>
										<td align='center'><b>Rp. ".number_format($all_kredit,0,",",".")."</b></td>
									</tr>
							";
						?>
					</table>
				</div>
			</div>
        </div>
    </div>
	<div class="col-md-3">
						<b>INPUT TRANSAKSI : </b><br>
						<form method="POST" action="<?php echo $siteurl;?>/lib/controller.php?page=transaksi&action=insert">
						Tanggal Transaksi : <br>
						<input type="date" required name="tgl" value="<?php echo date("m/d/Y");?>" id="tgl_transaksi" class="form-control">
						Akun :
						<select name="id_akun" required class="form-control">
							<?php
								error_reporting(0);
								$data=mysql_query("SELECT * from tb_akun");
								$j=mysql_num_rows($data);
								if($j==0){
									echo"<option>--Pilih Akun--</option>";
								}else{
									while($v=mysql_fetch_array($data)){
									echo"
										<option value='$v[id]'>$v[nama_akun]</option>
									";
									}
								}

							?>
						</select>
						
						Nominal : Rp.
						<input type="text" required name="nominal" class="form-control">
						
						Keterangan :
						<textarea name="ket" required class="form-control"></textarea>
						
						Tipe :
						<select name="tipe"  required class="form-control">
							<option value="D">Debet</option>
							<option value="K">Kredit</option>
						</select><br>
						
						<input type="submit" name="simpan" value="Simpan Transaksi" class="btn btn-primary">
					</form>
	</div>
	
	
</div>



