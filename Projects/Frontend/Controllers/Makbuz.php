<?php

class Makbuz extends Controller{
	
	function main(){import::view('makbuz/makbuz');}

	/* Ayni bağış alındı belgesi */
	function abab($msira = ''){
		logSave('Ayni Bağış Alındı bölümüne Giriş Yaptı.');
		$data['kocanno'] = DB::select('kocanno')->groupBy('kocanno')->get('abab')->result();
		$data['msira'] = DB::select('msira')->groupBy('msira')->get('abab')->result();
		$data['adi'] = DB::select('adi')->groupBy('adi')->get('abab')->result();
		
		if (method::post('bagisci')) {
			logSave('Ayni Bağış Alındı bölümünde '.method::post('bagisci').' araması yaptı.');
			$data['listele'] = $this->abab_model->bagisciListele(method::post('bagisci'));
		}

		if (method::post('kocanno')) {
			logSave('Ayni Bağış Alındı bölümünde koçan no: '.method::post('kocanno').' araması yaptı.');
		$data['listele'] = $this->abab_model->kocannoListele(method::post('kocanno'));
		}

		if (method::post('msira')) {
			logSave('Ayni Bağış Alındı bölümünde sıra no: '.method::post('msira').' araması yaptı.');

		$data['listele'] = $this->abab_model->msiraListele(method::post('msira'));
		}

		if ($msira) {
			logSave('Ayni Bağış Alındı bölümünde sıra no: '.$msira.' araması yaptı.');
		$data['listele'] = $this->abab_model->msiraListele($msira);
		}

		import::view('makbuz/abab/abab',$data);
	}

	function abab_edit($id){
		if (method::post('islem') == 'editsave') {$this->abab_model->update(method::post());	}
			if (method::post('islem') == 'mcsave') {$this->abab_model->mcinsert(method::post());	}

		$data['edit'] = $this->abab_model->edit($id);
		import::view('makbuz/abab/abab_edit',$data);
	}

	// Ayni Bağış Alındı Belgesi Giriş Formu
	function abab_giris(){
		if(method::post()){$this->abab_model->form(method::post());}
			
		import::view('makbuz/abab/abab_new');
	}

	function abab_delete($id){
		DB::where('id', $id)->delete('abab');
		DB::where('abab_id', $id)->delete('abb');

		if (DB::affectedRows()) {
			redirect(P::link('makbuz/abab'));
		}
	}

	/* /Ayni bağış alındı belgesi */


	// ayni yardım teslim belgesi
	function aytb(){
		
		$data['kocanno'] = $this->aytb_model->kocanno();
		$data['msira'] = $this->aytb_model->msira();
		$data['isim'] = $this->aytb_model->isim();

		

		if (method::post('adi')) {
			logSave('Ayni yardım teslim bölümüne '.method::post('adi').' araması yaptı.');
			$data['listele'] = $this->aytb_model->adiAra(method::post('adi'));

			
		}

		if (method::post('kocanno')) {
			logSave('Ayni yardım teslim bölümüne kocanno:'.method::post('kocanno').' araması yaptı.');
			$data['listele'] = $this->aytb_model->kocannoAra(method::post('kocanno'));}

		if (method::post('msira')){
			logSave('Ayni yardım teslim bölümüne makbuz no:'.method::post('msira').' araması yaptı.');
			$data['listele'] = $this->aytb_model->msiraAra(method::post('msira'));}

		if (method::post('uyeno')){
			logSave('Ayni yardım teslim bölümüne üye no:'.method::post('uyeno').' araması yaptı.');
			$data['listele'] = $this->aytb_model->uyenoara(method::post('uyeno'));}	

		import::view('makbuz/aytb/aytb_view',$data);
	}

	// Ayni Yardım Teslim Belgesi Giriş Formu
	function aytb_cikis($id = ''){

		$data['malzeme'] = $this->aytb_model->malzemeList();
		$data['kisi'] = uye_bilgi($id);
		if (method::post()) {$this->aytb_model->aytbSave(method::post());}
		import::view('makbuz/aytb/aytbForm_view',$data);  
	}

	function aytb_delete($id){
		DB::where('id', $id)->delete('aytb');
		DB::where('aytbid', $id)->delete('aytbml');

		if (DB::affectedRows()) {
			redirect(P::link('makbuz/aytb'));
		}
	}

	function aytb_edit($id){
	
		$data['malzeme'] 	= $this->aytb_model->malzemeList();
		//$data['kisi'] 		= $this->aytb_model->makbuz1($id);
		import::view('makbuz/aytb/aytb_edit',$data);
	}

	// ayni alındı belgesi (Nakit Bağış yada aidat için kesilen makuz)
	function alindi(){import::view('makbuz/alindi');}
}//class sonu