<?php 

	class Ayar_model extends Model{
		
		function malzemeEkle($post){
			DB::insert('malzeme',[
				'adi'		=> $post['malzemeAdi'],
				'durum'		=> '1',
				'dernekid'	=> '1',
			]);
			redirect('ayar/talep');
		
		}
	}

	