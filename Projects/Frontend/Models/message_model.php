<?php 
	/**
	* created by: Erkan Işık
	* created date: 20170910
	**/
	class Message_model extends model{
		
		function kime_list(){return DB::where('dernekid',Session::select('dernekid'))->get('kullanici')->result();}

		function message_read(){return DB::orderBy('tarih','desc')->where('kime', Session::select('userid'),'and')->where('okunma','0')->get('message')->result();}

		function message_list(){return DB::orderBy('tarih','desc')->where('kime', Session::select('userid'),'and')->where('okunma','1')->get('message')->result();}

		function sender(){return DB::orderBy('tarih','desc')->where('yazar', Session::select('kadi'))->get('message')->result();}
		

		function message_save($post){
			
			DB::insert('message', [
				'kime' 		=> $post['kime'],
				'baslik' 	=> $post['baslik'],
				'message' 	=> $post['mesaj'],
				'yazar' 	=> Session::select('kadi'),
				'sender' 	=> Session::select('userid'),
				'dernekid'	=> Session::select('dernekid'),
				'okunma' 	=> '1'
				]);

				
			if (DB::affectedRows()) {


				$message = "Mesajın geldiği yer: Edernek Mesajlaşma\n Konu: ".$post['baslik']."\nMesaj: ".$post['mesaj']."\nGönderen: ".Session::select('kadi');
                telegram($message);
				redirect(P::link('message'));
			}else{
				echo DB::error();
			}
			
		}
	}//class end
