<?php namespace Project\Controllers;

use Method, Post, DB, URI;

class Uye extends Controller {

	function main(){
		if(Method::post()){
			$ara = DB::where('id',Post::uyeadi())->uyeResult();
			view::uyebilgi($ara);
		}
	}

	function kayit(){
		if (Method::post()){$this->uye_model->new_user(Method::post());}
		
	}

	function engellikayit(){
		if (Method::post()){$this->uye_model->new_user(Method::post());}
	}

	function saglamkayit(){
		if (Method::post()){$this->uye_model->new_user(Method::post());}
	}


/*
	function yeni(){
		if (Method::post()){$this->uye_model->new_user(Method::post());}
		
		//Import::view('uye/new');
	}
*/
	function delete($id){
		DB::where('id',$id)->delete('uye');
		if (DB::affectedRows()) {redirect('uye/ara');}
	}

	function ara(){
		$data['uyebilgi'] = '';
		if (method::post()) {
			$data['uyebilgi'] = $this->uye_model->uye_ara(method::post());

		}	
			
		//import::view('uye/uye_ara',$data);
	}

	function talep(){import::view('uye/uye_talep');}

	function hastabezi(){import::view('uye/uye_hastabezi');}

	function duzenle(){
		$id = Uri::get('duzenle');
		if (method::post()){$this->uye_model->uye_update(method::post());}
		//$data['id'] = $id;
		view::id($id);
		//import::view('uye/edit',$data);
	}

	function detay(){
		$id = Uri::get('detay');

		
		//if ($id) {$aidat = $this->uye_model->aidat($uyeno);}
		
		
		//$aytb = $this->uye_model->aytb($isim);

		view::id($id);
		
		//import::view('uye/uye_detay_view',$data);
	}


	function onaylandi($dt){
		if(method::post()){$this->uye_model->onaylandi(method::post());}
		$data['sonuye'] = DB::orderBy('id','desc')->where('uyedurumu', 'AKTİF')->limit('1')->get('uye')->row();
		$data['onaybilgi'] = DB::where('id',$dt)->get('uye')->row();
		import::view('uye/onaylandi',$data);
	}

	function onaylanmadi($dt){
		if(method::post()){$this->uye_model->onaylanmadi(method::post());}
		$data['onaybilgi'] = DB::where('id',$dt)->get('uye')->row();
		import::view('uye/onaylanmadi',$data);
	}

	function uyelikformu(){
		$id = Uri::get('uyelikformu');
		$dzn = $this->uye_model->uye_duzenle($id);
		view::id($id);
		//import::view('uye/uyelikformu',$data);
	}


	// aidat işlemleri

	

} 
