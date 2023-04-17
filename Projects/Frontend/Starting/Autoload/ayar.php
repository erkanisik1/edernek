<?php 
	
	function talep(){return DB::orderBy('adi','asc')->where('dernekid',1,'and')->where('durum','1')->malzeme()->result();}
	function malzemeList(){return DB::orderBy('adi','asc')->malzeme()->result();}
	function talepler(){return DB::talepler()->result();}
	function malzemeAdi($id){return DB::select('adi')->where('id',$id)->malzeme()->value();}

