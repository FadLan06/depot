<?php
class config{
	public function siteurl(){
		return "http://localhost/depot";
	}
	
	public function koneksi(){
		mysql_connect("localhost","root","");
		mysql_select_db("depot");
	}
}
?>