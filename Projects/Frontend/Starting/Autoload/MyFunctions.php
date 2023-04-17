<?php 

function engel_aciklamasi_row($data){return DB::where('engl_aciklamasi',$data)->uye()->row();}

function engel_aciklamasi(){return DB::query('SELECT DISTINCT engl_aciklamasi FROM uye WHERE engl_aciklamasi != "" ')->result();}

function evadresi($id){
    $adress = DB::select('i_mh,i_cd,i_sk,i_site,i_kapino,i_daireno,i_ilce,i_il')->where('id',$id)->get('uye')->row();
    if (empty($adress->i_mh)) {$mh = "";}else{$mh = $adress->i_mh." MAHALLESİ. ";}
    if (empty($adress->i_cd)) {$cd = "";}else{$cd = $adress->i_cd." CADDESİ. ";}
    if (empty($adress->i_sk)) {$sk = "";}else{$sk = $adress->i_sk." SOKAK. ";}
    if (empty($adress->i_kapino)) {$kapino = "";}else{$kapino = ' NO:'.$adress->i_kapino." - ";}
    if (empty($adress->i_daireno)) {$daireno = "";}else{$daireno = $adress->i_daireno." ";}
    if (empty($adress->i_ilce)) {$ilce = "";}else{$ilce = ilceAdi($adress->i_ilce)." / ";}
    if (empty($adress->i_il)) {$il = "";}else{$il = ilAdi($adress->i_il);}
    return $mh.$cd.$sk.$kapino.$daireno.$ilce.$il;
 }

function yasi($pt){return gmdate("Y")-gmdate("Y",strtotime($pt));}

function tarih($tarih, $ayrac = '.') {
  $tr = explode($ayrac,$tarih);
  $tarih =  $tr['2']."-".$tr['1']."-".$tr['0'];
  return $tarih;
} 


function makbuzson($data){return DB::select($data)->limit(null,'1')->orderBy($data,'desc')->get('abab')->value();}

function abbList($data){return DB::where('abab_id',$data)->orderBy('abb_sn', 'asc')->get('abb')->result();}

function abbList2($d = '',$e = ''){return DB::where('abab_id',$d,'and')->where('abb_sn',$e)->get('abb')->row();}

function tcevir($tarih = '') {
  $bosluk = explode(' ', $tarih);
  $tr = explode("-",$bosluk['0']);
  $tarih1 = $tr['2']."-".$tr['1']."-".$tr['0'];
  return $tarih1;   
} 

/* il functions */
function il(){return DB::orderBy('adi','asc')->il()->result();}

function ilce(){return DB::orderBy('adi','asc')->ilce()->result();}

 function ilAdi($id){return DB::select('adi')->where('id',$id)->il()->value();}

function ilceAdi($id){return DB::select('adi')->where('id',$id)->ilce()->value();}


/* /il functions */

function selected($a,$b){
  return $selected = ($a==$b)?'selected':'';
  //if($a == $b){echo "selected";

}

function checked($a,$b,$c='0'){
  $d = '';
  if($c==1){
    $array = explode(',', $b);
    $d = in_array($a,$array) == true?'checked':'';

  }else{
    $d = $a == $b?'checked':'';

  //if($a == $b){echo "id='check' checked";}
  }

  return $d;

}

function arac_duzenle($id){return DB::where('id',$id)->get('aractakip')->row();}

function yas($pt){return gmdate("Y")-gmdate("Y",strtotime($pt));}

function engelGrubu(){return DB::orderBy('engelGrubu','asc')->engelGrubu()->result();}

function ogrenimdurumu(){return DB::orderBy('name','asc')->ogrenimdurumu()->result();}

function evrak(){return DB::orderBy('name','asc')->evrak()->result();}

function eosList(){return DB::orderBy('name','asc')->eosList()->result();}

function uyeTur(){return DB::orderBy('name','asc')->uyeTur()->result();}

function check($a){
  $e = '';

  if($a == 1){
    $e = '<i class="fa fa-check link-success fa-2x"></i>';
  }else{
    $e = '<i class="fa fa-times link-danger fa-2x"></i>';
  }

  return $e;
}

