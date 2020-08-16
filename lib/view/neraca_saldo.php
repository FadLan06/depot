<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
        <div class="panel-heading">
        NERACA SALDO
        </div>
        <div class="panel-body">
        <div class="table-responsive">
			<table class="table table-striped table-bordered table-hover">
		<tr style="background-color:#7bb3ff;">
			<td align="center" style="padding:10px;"><b>No</b></td>
			<td align="center" style="padding:10px;"><b>Kode Akun</b></td>
			<td align="center" style="padding:10px;"><b>Nama Akun</b></td>
			<td align="center" style="padding:10px;"><b>Debet</b></td>
			<td align="center" style="padding:10px;"><b>Kredit</b></td>
		</tr>
		
		<?php
		error_reporting(0);
		$data=mysql_query("SELECT *, tb_jurnal.id_akun 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id group by tb_jurnal.id_akun");
		$no=1;
		$ts_debet="0";
		$ts_kredit="0";
		while($d=mysql_fetch_array($data)){
			$total_debet="";
			$total_kredit="";
			$saldo_debet="0";
			$saldo_kredit="0";

			$neraca=mysql_query("SELECT *, tb_jurnal.id_akun 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.id_akun='$d[idakun]' ");

			while($n=mysql_fetch_array($neraca)){
				switch($n['tipe']){
					case"D":
						$debet=$n['nominal'];
						$kredit="";
						
					break;
					case"K":
						$kredit=$n['nominal'];
						$debet="";
					break;
				}
				$total_debet += $debet;
				$total_kredit += $kredit;
				
				switch($n['kategori']){
					case"HL":
						$saldo_debet=$total_debet-$total_kredit;
						$posisi="Debet";
					break;
					
					case"HT":
						$saldo_kredit=$total_kredit-$total_debet;
						$posisi="Kredit";		
					break;
				}
				
				

			}
			
		$ts_kredit += $saldo_kredit;
		$ts_debet += $saldo_debet;
		echo"
			<tr>
				<td align='center'>$no</td>
				<td align='center'>$d[kode]</td>
				<td style='padding-left:10px;'>$d[nama_akun]</td>
				<td align='right'>Rp. ".number_format($saldo_debet,0,",",".")."</td>
				<td align='right'>Rp. ".number_format($saldo_kredit,0,",",".")."</td>
			</tr>
		";
		$no++;
		}

	?>
		<tr>
			<td colspan='3' align='center'><b>Total</b></td>
			<td align='center'>Rp. <?php echo number_format($ts_debet,0,",",".");?></td>
			<td align='center'>Rp. <?php echo number_format($ts_kredit,0,",",".");?></td>
		</tr>
	</table>
				</div>
			</div>
		</div>
	</div>
</div>


