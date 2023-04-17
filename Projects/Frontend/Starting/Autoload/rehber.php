<?php 


	function rehberKategori(){return DB::rehber_kategori()->result();}

	function kategori(){return  DB::select('kategori')->groupBy('kategori')->orderBy('kategori','asc')->get('rehber')->result();}

	function isim(){return  DB::select('isim')->orderBy('isim','asc')->get('rehber')->result();}

	function kategoriara($post){return  DB::where('kategori',$post)->orderBy('id','asc')->rehber()->result();}

	function isimara($post){return  DB::whereLike('isim',$post)->orderBy('id','asc')->get('rehber')->result();}