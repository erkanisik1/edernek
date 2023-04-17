<?php 

class Kurullar_model extends Model{

	function new($post){	
		output($post);
			
		DB::insert('yonetim',[
			'adi' 		=> $post['adi'],
			'gorevi' 	=> $post['gorevi'],
			'durum' 	=> '1',
			'kurul_adi' => $post['kurul_adi'],
			'sira' 		=> '0',
			'ilk_tarih'	=> $post['ilktarih'],
			'son_tarih' => $post['sontarih'],
			'dernekid' 	=> '1',
			'imzaYetki' => $post['imzaYetki']
		]);
		if (DB::affectedRows()) {			
			redirect('/ayar/kurullar');
		}else{
				$mesaj = 'DB NAME: yonetim. DB İşlem: Kurul Üye yeni. HATA: '.DB::error();
				echo $mesaj;
				telegram($mesaj);
				alert('Programcıya hata ile ilgili bilgi gönderildi en kısa zamanda sorun halledilecektir.');
	
			}	

			
	}// new function end
	
	function update($post){
		DB::where('id',$post['id'])->update('yonetim',[
			'adi' 		=> $post['adi'],
			'gorevi' 	=> $post['gorevi'],
			'durum' 	=> $post['durum'],
			'ilk_tarih' => $post['ilktarih'],
			'son_tarih' => $post['sontarih'],
			'imzaYetki' => $post['imzaYetki'],
			'kurul_adi' => $post['kurul_adi'],
			
		]);
		if (DB::affectedRows()) {
			redirect('ayar/kurullar');
		}
	}


}