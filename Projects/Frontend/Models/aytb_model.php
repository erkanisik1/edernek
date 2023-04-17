<?php 
/**
* Created Date: 2017-10-01
* Update Date : 2017-01-25
*/
class Aytb_model extends model{
	
	// makbuzların kocan numaralarını listeyen fonksiyon
	function kocanno(){
		return DB::select('kocanno')->groupBy('kocanno')->orderBy('kocanno' ,'asc')->get('aytb')->result();
	}

	// makbuzların sıra numaralarını listeyen fonksiyon
	function msira(){
		return DB::groupBy('msira')->orderBy('msira','asc')->get('aytb')->result();
	}

	function isim(){
		return DB::groupBy('adi')->orderBy('adi','asc')->where('nasilverildi','MAKBUZ')->get('aytb')->result(); 
	}

	function mabbuz1($id){
		return DB::where('id',$id)->get('aytb')->row(); 
	}

	function adiAra($post){
		return DB::orderBy('kocanno','asc')
		->orderBy('msira','asc')
		->where('adi LIKE',"%$post%",' and')
		->where('nasilverildi','MAKBUZ',' and')
		->where('dernekid',Session::select('dernekid'))
		->get('aytb')
		->result();
	}

	function kocannoAra($post){

		return DB::orderBy('msira','asc')
		->where('kocanno',$post,'and')
		->where('nasilverildi','MAKBUZ','and')
		->where('dernekid',Session::select('dernekid'))
		->get('aytb')
		->result();
	}

	function msiraAra($post){
		return  DB::orderBy('msira','asc')
		->where('msira',$post,'and')
		->where('nasilverildi','MAKBUZ','and')
		->where('dernekid',Session::select('dernekid'))
		->get('aytb')
		->result();
	}

	function malzemeList(){
		return DB::orderBy('adi','asc')->where('durum','1')->get('malzeme')->result();
	}

	function aytbSave($post){
		
	
		DB::insert('aytb',[
			'msira' 		=> $post['msira'],
			'uyeid' 		=> $post['uyeid'],			
			'adi' 			=> $post['isim'],
			'yyeri' 		=> $post['adres'],
			'telefon' 		=> $post['telefon'], 
			'teden' 		=> $post['teden'],
			'bht' 			=> $post['bht'],
			'ttarih' 		=> $post['ttarih'],
			'talan' 		=> $post['talan'],
			'nasilverildi' 	=> 'MAKBUZ',
			'kocanno' 		=> $post['kocanno'], 
			'dernekid' 		=> Session::select('dernekid'),
			'not1'			=> '',
			'iptal'			=> '1'
			]);

		if (DB::affectedrows()) {
			$id = DB::insertID();
			for ($i=1; $i < 10 ; $i++) { 
				$d = 'aytb'.$i;

			if($post[$d][0]){
			DB::insert('aytbml',[
				'sirano' 	=> $i ,
				'mcinsi'	=> $post[$d][0],
				'adet' 		=> $post[$d][1],
				'birim' 	=> $post[$d][2],
				'aytbid' 	=> $id,
				'aciklama' 	=> $post[$d][3]
			]);
		}

		}// for sonu
		redirect('tofdbeykoz/makbuz/aytb');
		}else{
			echo DB::error();
		}// if sonu
	}
		
	
}// class sonu