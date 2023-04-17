<?php namespace Project\Controllers;
use DB,Method;

class Ajax extends Controller{
	
	function ilsorgu(){
		$a = '';
		$il = method::post('il');		
		$s = DB::where('il_id',$il)->orderBy('adi', 'asc')->ilce()->result();			
		foreach ($s as $key) {
			echo  '<option value="'.$key->id.'">'.$key->adi.'</option>';
		}
echo '3333';
	}


}