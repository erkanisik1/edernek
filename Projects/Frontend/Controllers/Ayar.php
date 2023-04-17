<?php namespace Project\Controllers;

use User, URI, Session, Method,DB;



/**
 * 
 */
class Ayar extends Controller
{

	function main(){

	}

	function kullaniciList(){

	}

	function kullaniciekle(){
		if(Method::post()){
			$this->Kullanici_model->new(Method::post());
		}
	}

	function kurullar(){
		
	}

	function kurullarYeni(){
		if (Method::post()) {$this->kurullar_model->new(Method::post());}
	}


	function kurullarDelete(){
		$id = Uri::get('kurullarDelete');
		DB::where('id',$id)->delete('yonetim');
		redirect('/ayar/kurullar');
	}

	function kurullarEdit(){
		$id = Uri::get('kurullarEdit');
		if (Method::post()) {$this->kurullar_model->update(Method::post());}
		view::id($id);


	}

	function talep(){

	}

	function malzemeEkle(){
		if (Method::post()) {
			$this->ayar_model->malzemeEkle(Method::post());
		}
	}

	function malzemeDelete(){
		$id = Uri::get('malzemeDelete');
		DB::where('id',$id)->delete('malzeme');
		redirect('ayar/talep');
	}

	function malzemeEdit(){

		$id = Uri::get('malzemeEdit');
		view::id($id);

	}





}

