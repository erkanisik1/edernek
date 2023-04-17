<?php 


function aytb_uye(){
  return DB::select('id, adi, soyadi, i_mh, uyeno')
  ->where('dernekid',1)
  ->orderBy('adi,soyadi','asc')
  ->get('uye')
  ->result();   

}

function aytbml_list($aytb_id){
  return DB::where('aytbid',$aytb_id)->get('aytbml')->result();
}


function aytbList($data){
	return DB::where('aytbid',$data)->orderBy('sirano', 'asc')->get('aytbml')->result();
}

function aytb($id){
	return DB::orderBy('kocanno','asc')->where('uyeId',$id)->aytb()->result();
}