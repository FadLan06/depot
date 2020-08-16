<?php
class crud extends config{
	public function tes(){
		echo "Ada";
	}
//CRUD Akun	
	public function tambah_akun($nama_akun,$kat,$kode){
		$this->koneksi();
		$siteurl	=	$this->siteurl();
		
		$cari = mysql_query("select * from tb_akun where kode='$kode'");
		$hasil = mysql_fetch_array($cari);
		$data_akun = $hasil['kode'];
		
		if ($data_akun!=""){
		?>
        <script language="javascript">
		  alert("Kode Akun Sudah Ada");
		  document.location='http://localhost/depot/?page=tambah_akun'
		</script>

		<?php		
		}else{	
		   $insert=mysql_query("INSERT into tb_akun (nama_akun,kategori,kode) values ('$nama_akun','$kat','$kode')");
		   if($insert){
			  echo "<script>alert('Akun telah ditambahkan'); location='$siteurl/?page=tambah_akun';</script>";
		   }else{
			  echo "<script>alert('Gagal'); llocation='$siteurl/?page=tambah_akun';</script>";
		   }
		
		}
		
	}
	
	public function hapus_akun($id){
		$this->koneksi();
		$siteurl	=	$this->siteurl();
		$hapus_transaksi=mysql_query("DELETE from tb_jurnal where id_akun='$id' ");
		if($hapus_transaksi){
			$hapus_akun=mysql_query("DELETE from tb_akun where id='$id' ");
					if($hapus_akun){
						echo "<script>alert('Akun dan transaksi dihapus'); location='$siteurl/?page=tambah_akun';</script>";
					}else{
						echo "<script>alert('Gagal menghapus akun'); location='$siteurl/?page=tambah_akun';</script>";
					}
		}else{
			echo "<script>alert('Gagal menghapus transaksi'); location='$siteurl/?page=tambah_akun';</script>";
		}

	}
//--------------------------------------------------------------------------------------------------------------------------------------------------------

//CRUD transaksi
	public function input_transaksi($tgl, $id_akun, $ket, $nominal, $tipe){
		$this->koneksi();
		$siteurl	=	$this->siteurl();
		
		$cari = mysql_query("select * from tb_jurnal");
		$num = mysql_num_rows($cari);
		
		if($num==0 and $tipe=="K") {
		?>
        <script language="javascript">
		  alert("Kredit Tidak Boleh Duluan");
		  document.location='http://localhost/depot/?page=input_transaksi'
		</script>
		<?php		
		}else{
		
		$insert=mysql_query("INSERT into tb_jurnal (tgl, id_akun, ket, nominal, tipe) values ('$tgl','$id_akun','$ket','$nominal','$tipe')");
		if($insert){
			echo "<script>alert('Transaksi telah diinput'); location='$siteurl/?page=input_transaksi';</script>";
		}else{
			echo "<script>alert('Gagal'); location='$siteurl/?page=input_transaksi';</script>";
		}
		}
	}
	
	public function hapus_transaksi($id){
				$id=$_GET['id'];
				$this->koneksi();
				$siteurl	=	$this->siteurl();
				$hapus=mysql_query("DELETE from tb_jurnal where id='$id' ");
				if($hapus){
					echo"<script>alert('Transaksi dihapus') location='$siteurl/?page=input_transaksi';</script>";
				}else{
					echo"<script>alert('Gagal');</script> location='location='$siteurl/?page=input_transaksi'' ";
				}
	}
//--------------------------------------------------------------------------------------------------------------------------------------------------------------

//CRUD Buku Besar
//-------------------------------------------------------------------------------------------------------------------------------------------------------------
}

?>