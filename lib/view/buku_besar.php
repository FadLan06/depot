<b>BUKU BESAR</b><br>
<i>- Total saldo debet didapatkan dari total debet dikurangi total kredit (Saldo Debet = Total Debet - Total Kredit)</i><br>
<i>- Total saldo kredit didapatkan dari total kredit dikurangi total debet (Saldo Kredit = Total Kredit - Total Debet)</i><br><br>
<div class="row">
	<div class="col-md-3">
        <div class="panel panel-default">
        <div class="panel-heading">
		AKUN :
		</div>
		<div class="panel-body">
					<?php
				$data=mysql_query("SELECT *,count(tb_jurnal.id_akun) 'jumlah_akun', tb_akun.id 'idakun' from tb_jurnal, tb_akun where tb_jurnal.id_akun=tb_akun.id group by tb_jurnal.id_akun");
				$no=1;
				while($v=mysql_fetch_array($data)){
				echo "$no. <a href='#' id='id_akun' onclick='detail_akun($v[idakun])'>$v[nama_akun] </a>($v[jumlah_akun])<br>";
				$no++;
				}
			?>
		</div>
	</div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
        <div class="panel-heading">
        DETAIL AKUN 
        </div>
		<div class="panel-body" id="detail_akun"></div>
	</div>
</div>
</div>

<script>
	
	function detail_akun(idakun){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState==1 || xhttp.readyState==2 || xhttp.readyState==3){
				document.getElementById("detail_akun").innerHTML="Memuat data...";
			}
			
			if(xhttp.readyState==4){
				document.getElementById("detail_akun").innerHTML=xhttp.responseText;
			}
			
		};
		xhttp.open("GET", "assets/ajax-konten/detail_akun_tes.php?idakun="+idakun, true);
		xhttp.send();
	}
</script>