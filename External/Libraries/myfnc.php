<?php 

class Myfnc{
  
  public static function uyemah()
  {
   $d = DB::select('id, adi, soyadi, i_mh')
   ->orderBy('adi,soyadi','asc')
   ->where('dernekid',Session::select('dernekid'))
   ->get('uye')
   ->result();
   $a = '<select name="uye" id=""><option value="">Seçiniz...</option>';
   foreach ($d as $key ) {
    $a .= '<option value="'.$key->id.'">'.$key->adi.' '.$key->soyadi.' > '.$key->i_mh.'.MAH</option>';
  }

  $a .= '</select>';

  return $a;

}

public static function il_select(){
  return DB::orderBy('CityName','asc')->get('iller')->result();
}


public static function uye(){
  return DB::select('id, adi, soyadi, i_mh, uyeno')
  ->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
  ->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
  ->where('uyedurumu NOT LIKE','VEFAT', 'and')
  ->where('uyedurumu NOT LIKE','AYRILDI', 'and')
  ->where('dernekid',Session::select('dernekid'))
  ->orderBy('adi,soyadi','asc')
  ->get('uye')
  ->result();   

}



public static function uye_bilgi($post){
  return DB::select('adi,soyadi,tc,uyeno,evadres')->where('uyeno',$post)->get('uye')->row();
}

public static function uyeadres($post){
  return DB::select('evadres')->where('uyeno',$post)->get('uye')->value();
}

public static function tcevir($tarih) {
  $bosluk = explode(' ', $tarih);
  $tr = explode("-",$bosluk['0']);
  $saat = $bosluk['1']['0'].$bosluk['1']['1'].$bosluk['1']['2'].$bosluk['1']['3'].$bosluk['1']['4'];
  $tarih1 = $tr['2']."-".$tr['1']."-".$tr['0'].' '.$saat;
  return $tarih1;
} 

public static function tarih($tarih, $ayrac = '.') {
  $tr = explode($ayrac,$tarih);
  $tarih =  $tr['2']."-".$tr['1']."-".$tr['0'];
  return $tarih;
} 

public static function yonetim($drm = '1'){return DB::where('durum',$drm)->orderBy('sira','asc')->get('yonetim')->result();}



public static function yas($pt){return gmdate("Y")-gmdate("Y",strtotime($pt));}

//public static function message_count(){return DB::select(COUNT('id'))->where('kime',Session::select('userid'),'and')->where('okunma','0')->get('message')->value();}

public static function message_send_user($data){return DB::select('adi')->where('id', $data)->get('kullanici')->value();}

public static function log($data){
  $data = Session::select('kadi').' adlı kullanıcı '.$data;
  DB::insert('log',[
    'userid' => session::select('userid'),
    'islem' => $data,
    ]);
}

}