<?php 

/**
* Ayni Bağış Alındı Belgesi veritabanı işlemleri
* Created Date: 23-10-2017
* Update Date: 10-11-2017
*/
class Abab_model extends Model{
	
	function bagisciListele($bagisci){

		return  DB::orderBy('ttarih','asc')
				->orderBy('kocanno','asc')
				->orderBy('msira','asc')
				->where('adi',$bagisci,'and')
				->where('nasilverildi','MAKBUZ','and')
				->where('dernekid',Session::select('dernekid'))
				->get('abab')
				->result();
	}

	function kocannoListele($kocanno){
		return DB::orderBy('msira','asc')
				->where('kocanno',$kocanno,'and')
				->where('nasilverildi','MAKBUZ','and')
				->where('dernekid',Session::select('dernekid'))
				->get('abab')
				->result();
	}

	function msiraListele($msira){
		return DB::orderBy('msira','asc')
				->where('msira',$msira,'and')
				->where('nasilverildi','MAKBUZ','and')
				->where('dernekid',Session::select('dernekid'))
				->get('abab')
				->result();
	}

	function form($data){

		DB::insert('abab',[
			'msira' => $data['mtno'],
			'adi' => $data['bas'],
			'yyeri' => $data['badres'],
			'telefon' => $data['btel'],
			'teden' => $data['teas'],
			'ttarih' => $data['tat'],
			'talan' => $data['taas'],
			'nasilverildi' => $data['tur'],
			'kocanno' => $data['kno'], 
			'dernekid' => Session::select('dernekid'),
			]);
		alert(DB::error());



		if (DB::affectedrows()) {
			$id = DB::insertID();
			for ($i=1; $i < 10 ; $i++) { 
				$d = 'ab'.$i;

			if($data[$d][0]){
			DB::insert('abb',[
				'abb_sn' => $i ,
				'abb_mc' => $data[$d][0],
				'abb_miktar' => $data[$d][1],
				'abb_birim' => $data[$d][2],
				'abab_id' => $id,
			]);
		}		
	}// for sonu

	redirect(P::link('makbuz/abab'));
		
		}// if sonu
	}


	function update($data){

			DB::where('id',$data['id'])->update('abab',[
			'msira' => $data['mtno'],
			'adi' => $data['bas'],
			'yyeri' => $data['badres'],
			'telefon' => $data['btel'],
			'teden' => $data['teas'],
			'ttarih' => $data['tat'],
			'talan' => $data['taas'],
			'nasilverildi' => $data['tur'],
			'kocanno' => $data['kno'], 
			'dernekid' => Session::select('dernekid'),
			]);

echo DB::error();


			for ($i=1; $i < 10 ; $i++) { 
				$d = 'ab'.$i;

			if(!empty($data[$d][0])){

			DB::where('abb_id',$data[$d][0])->update('abb',[
				'abb_sn' => $i,
				'abb_mc' => $data[$d][2],
				'abb_miktar' => $data[$d][3],
				'abb_birim' => $data[$d][4],
				
			]);
		}
				
	} // for sonu
	redirect(P::link('makbuz/abab/'.$data['mtno']));
		
		
	}


function edit($post){
	return DB::where('id',$post)->get('abab')->row();	
}

function mcinsert($post){
	DB::insert('abb',[
	  'abb_sn' => $post['abb_sn'],
	  'abb_mc' => $post['abb_mc'],
	  'abb_miktar' => $post['abb_miktar'],
	  'abb_birim' => $post['abb_birim'],
	  'abab_id' => $post['abab_id'],
	]);
	if (DB::affectedrows()) {
		redirect(P::link('makbuz/abab_edit/'.$post['abab_id']));
	}
}

}