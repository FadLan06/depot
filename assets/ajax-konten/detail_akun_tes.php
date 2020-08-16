<?php
	require_once("../../lib/config.php");
	$idakun=$_GET['idakun'];
	$cek_akun=mysql_fetch_array(mysql_query("SELECT * from tb_akun where id='$idakun' "));
?>
	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td><b>Nama Akun : <?php echo $cek_akun['nama_akun'];?></b></td>
			<td><b>Nomor Akun :  <?php echo $cek_akun['kode'];?></b></td>
		</tr>
	</table>

	<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<tr style="background-color:#7bb3ff;">
			<td colspan='2' align='center' ><b>Transaksi</b></td>
			<td colspan='2' align='center'><b>Saldo</b></td>
		</tr>
		<tr style="background-color:#7bb3ff;">
			<td align="center" width="20%"><b>Tanggal transaksi</b></td>
			<td align="center" width="50%"><b>Keterangan</b></td>
			<td align="center" width="15%"><b>Debet</b></td>
			<td align="center" width="15%"><b>Kredit</b></td>
		</tr>
	<?php

	$data_akun=mysql_query("SELECT *, tb_jurnal.id_akun 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.id_akun='$idakun' group by tb_jurnal.tgl");
	$j=mysql_num_rows($data_akun);


	$total_debet="0";
	$total_kredit="0";
	while($d=mysql_fetch_array($data_akun)){
		echo"
		<tr>
			<td align='center'>$d[tgl]</td>
			<td colspan='5'></td>
		</tr>
		";

		
		$akun=mysql_query("SELECT * from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.id_akun='$d[idakun]' and tb_jurnal.tgl='$d[tgl]' ");
		while($r=mysql_fetch_array($akun)){
			switch($r['tipe']){
				case"D":
					$nominal_debet=$r['nominal'];
					$nominal_kredit="0";
					$total_debet	+=	$nominal_debet;
					$tipe=$r['tipe'];
				break;
				
				case"K":
					$nominal_kredit=$r['nominal'];
					$nominal_debet="0";
					$total_kredit	+=	$nominal_kredit;
				break;
			}
			
			switch($r['kategori']){
				case"HL":
					$saldo=$total_debet-$total_kredit;
					$posisi="Debet";
				break;
				
				case"HT":
					$saldo=$total_kredit-$total_debet;
					$posisi="Kredit";
				break;
			}
			
					echo"
					<tr>
						<td></td>
						<td> <i>".$r['ket']."</i><br></td>
						<td align='right'>Rp. ".number_format($nominal_debet,0,",",".")."</td>
						<td align='right'>Rp. ".number_format($nominal_kredit,0,",",".")."</td>
					</tr>
				";
		}
		


	}
?>		
					<tr>
						<td align="center" colspan="2"><b>Total</b></td>
						<td align='right'>Rp. <?php echo number_format($total_debet,0,",",".");?></td>
						<td align='right'>Rp. <?php echo number_format($total_kredit,0,",",".");?></td>

					</tr>
		<tr style="background-color:#7bb3ff;">
			<td align="center" colspan="2"><b>Saldo <?php echo $posisi;?></b></td>
			<td align='center' colspan="2">Rp. <?php echo number_format($saldo,0,",",".");?></td>
		</tr>
	<table>
