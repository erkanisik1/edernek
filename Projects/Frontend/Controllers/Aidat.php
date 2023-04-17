<?php namespace Project\Controllers;

use Method, Session, URL, URI,DB;

/**
 * 
 */
class Aidat extends Controller{
	
	function main(){
		
	}

	function detay(){
		$id = Uri::get('detay');
		if (method::post('islem') == 'aidatkaydet') {
			$this->aidat_model->aidatkaydet(method::post());
		}
		
		if (Method::post('uyeno')) {$uyeno  =Method::post('uyeno');}
		
		if (Method::post('uyeid')) {$uyeno  =Method::post('uyeid');}
		
		if ($id) {$uyeno  = $id;}
		//$data['uyebilgi'] = $this->aidat_model->uye_bilgi($uyeno); 
		//$data['aidatbilgi'] = $this->aidat_model->aidat_bilgi($uyeno);
		//import::view('aidat/detay',$data);
		view::id($uyeno);
	}

	function delete($p){
		$no = DB::select('uyeno')->where('id',$p)->get('aidat')->value();
		DB::where('id', $p)->delete('aidat');
		redirect('aidat/detay/'.$no);

	}

	function edit(){
		$id = Uri::get('edit');
		if (method::post()) {$this->aidat_model->update(method::post());}
		$edit = DB::where('id',$id)->get('aidat')->row();
		$uyebilgi = DB::where('uyeno',$edit->uyeno)->get('uye')->row();
		//import::view('aidat/edit',$data);
		view::edit($edit)->uyebilgi($uyebilgi);
	}

}
