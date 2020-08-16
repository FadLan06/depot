<?php
	require_once("../../lib/config.php");
	$idakun=$_GET['idakun'];
	$cek_akun=mysql_fetch_array(mysql_query("SELECT * from tb_akun where id='$idakun' "));
?>
	<table width="100%">
		<tr>
			<td><b>Nama Akun : <?php echo $cek_akun['nama_akun'];?></b></td>
			<td><b>Nomor Akun :  <?php echo $cek_akun['kode'];?></b></td>
		</tr>
	</table>

	<table width="100%" border="1" style="border-collapse:collapse;">
		<tr style="background-color:#a3c8a0;">
			<td colspan='2' align='center'><b>Transaksi</b></td>
			<td colspan='2' align='center'><b>Nominal</b></td>
			<td colspan='2' align='center'><b>Saldo</b></td>
		</tr>
		<tr style="background-color:#a3c8a0;">
			<td><b>Tanggal transaksi</b></td>
			<td><b>Keterangan</b></td>
			<td><b>Debet</b></td>
			<td><b>Kredit</b></td>
			<td><b>Debet</b></td>
			<td><b>Kredit</b></td>
		</tr>
	<?php

	$data_akun=mysql_query("SELECT *, tb_jurnal.id_akun 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.id_akun='$idakun' group by tb_jurnal.tgl");
	$j=mysql_num_rows($data_akun);
	
	while($d=mysql_fetch_array($data_akun)){
		echo"
		<tr>
			<td align='center'>$d[tgl]</td>
			<td colspan='5'></td>
		</tr>
		";


		$akun=mysql_query("SELECT * from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id and tb_jurnal.id_akun='$d[idakun]' and tb_jurnal.tgl='$d[tgl]' ");
		$i=0;
		while($r=mysql_fetch_array($akun)){
				switch($r['tipe']){
					case"D":
						$nominal_debet=$r['nominal'];
						$nominal_kredit="0";
						$sd[]		=	$nominal_debet;
						$sk[]		=	$nominal_kredit;
						$kd[]		=	$r['kategori'];
					break;
					case"K":
						$nominal_kredit=$r['nominal'];
						$nominal_debet="0";
						$sd[]		=	$nominal_debet;
						$sk[]		=	$nominal_kredit;
						$kk[]		=	$r['kategori'];
						$kd[]		=	$r['kategori'];
					break;
				}
				echo"
					<tr>
						<td></td>
						<td>$r[nama_akun]<br>Ket : $r[ket]</td>
						<td align='right'>".number_format($nominal_debet,0,",",".")."$kd[$i] $sd[$i]</td>
						<td align='right'>".number_format($nominal_kredit,0,",","."). "$kd[$i]</td>
						<td>Debet</td>
						<td>Kredit</td>
					</tr>
				";
		$i++;
		}
		
	}
?>
		<tr style="background-color:#a3c8a0;">
			<td>TOTAL</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	<table>
