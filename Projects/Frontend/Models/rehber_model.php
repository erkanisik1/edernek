<?php

class Rehber_model extends Model{
	
	function kategoriAra($post){
		return DB::where('kategori', $post)->rehber()->result();
	}

	function isimAra($post){
		return DB::whereLike('isim', $post)->rehber()->result();
	}
}