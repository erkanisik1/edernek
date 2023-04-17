<?php 

 function uye($id){
    return DB::where('id',$id)->uyeRow();  
 } 

 function uye_bilgi($post){
  return DB::where('id',$post)->uye()->row();
}

function uyeList(){
  return DB::select('id, isim, i_mh, uyeno')
  ->orderBy('isim','asc')
  ->get('uye')
  ->result();   

}

function uye_edit($id){
  return DB::where('id',$id)->uyeRow();
}

function aidat($id){
  return DB::orderBy('ay','asc')->where('uyeno',$id)->aidatResult();
}


function uyedurumu(){
  return DB::orderBy('durum','asc')->uyedurumuResult();
}

function engelliUyeSayisi(){
  $count = DB::where('uyeTur','1')->uyeResult();
  return count($count);
}

function saglamUyeSayisi(){
  $count = DB::where('uyeTur','2')->uyeResult();
  return count($count);
}

function uyeturName($id){
  return DB::select('name')->where('id',$id)->uyeTur()->value();
}

function bekleyenuyeler(){
  return DB::where('uyedurumu', '1')->get('uye')->result();
}

function duyuru(){
  return DB::orderBy('tarih', 'desc')->where('kime', '0')->get('message')->result();
}

function il_select(){
  return DB::groupBy('i_il')
    ->select('i_il')
    ->orderBy('i_il','asc')
    ->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
    ->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
    ->where('uyedurumu NOT LIKE','VEFAT', 'and')
    ->where('uyedurumu NOT LIKE','AYRILDI', 'and')
    ->get('uye')
    ->result();
}

function ilce_select(){
  return DB::groupBy('i_ilce')
    ->select('i_ilce')
    ->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
    ->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
    ->where('uyedurumu NOT LIKE','VEFAT', 'and')
    ->where('uyedurumu NOT LIKE','AYRILDI', 'and')
    ->orderBy('i_ilce','asc')
    ->get('uye')
    ->result();
}
