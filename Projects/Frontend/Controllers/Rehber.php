<?php namespace Project\Controllers;

	use Import, URL, Method;

	class Rehber extends Controller{
	 	
	 	function main(){
	 		
			$katara = '';
	 		
			if (Method::post('kategori')) {$katara = $this->rehber_model->kategoriAra(method::post('kategori'));}
	 		
			if (Method::post('isim')) {$katara = $this->rehber_model->isimAra(method::post('isim'));}
	 		
	 		View::katara($katara); 
	 	}

	 	function yeni(){
			//$kategori	= $this->rehber_model->kategori();
	 		//$data['kategori'] = $this->rehber_model->kategori();
	 		//import::view('rehber/yeni_view',$data);
			if(Method::post()){
				$this->rehber_model->yeni(Method::post());
			}
			//View::kategori($kategori);
	 	}

	
	 }