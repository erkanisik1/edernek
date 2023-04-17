<?php 

class Aidat_model extends model{

	function aidat_bilgi($post){
		return DB::orderBy('ay','ASC')->where('uyeno',$post)->get('aidat')->result();		
	}

	function aidatkaydet($post){

		//$tarih = Myfnc::tarih($post['mkt'],'-');
		DB::insert('aidat',[
			'uyeno' 	=> $post['uyeno'],
			'mkt' 		=> $post['mkt'],
			'mno' 		=> $post['mn'],
			'mkesen'	=> $post['mk'],
			'ay' 		=> $post['ay'],
			'au' 		=> $post['au'],
			'dernekid'	=> '1'
			]);
		if (DB::affectedRows()) {
			redirect('aidat/detay/'.$post['uyeno']);	
		}
			output(DB::error());
		
	}


	function update($post){


		DB::where('id', $post['id'])->update('aidat',[
			'uyeno' 	=> $post['uyeno'],
			'mkt' 		=> $post['mkt'],
			'mno' 		=> $post['mno'],
			'mkesen'	=> $post['mkesen'],
			'ay' 		=> $post['ay'],
			'au' 		=> $post['au'],
			'dernekid'	=> '1'
			]);

		if (DB::affectedRows()) {
			redirect('aidat/detay/'.$post['uyeno']);
		}else{echo DB::error();
		}
	}


	
}//class sonuIncorrect date value: '1006-16-20' for column 'mkt' at row 1
