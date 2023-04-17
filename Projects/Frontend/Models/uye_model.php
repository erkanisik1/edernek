<?php 

class Uye_model extends model{

	/* kayıt işlemleri */

	function new_user($post){
	
		$isim = trim($post['adi']).' '.trim($post['soyadi']);
		$createDate = date('Y-m-d');

		/* İkamet Bilgileri */
		if($post['i_semt']){$i_semt = trim($post['i_semt']).' ';}else{$i_semt='';}
		if($post['i_cd']){$i_cd = trim($post['i_cd']).' CAD. ';}else{$i_cd='';}
		if($post['i_sk']){$i_sk = trim($post['i_sk']).' SK. ';}else{$i_sk='';}
		if($post['i_site']){$i_site = trim($post['i_site']);}else{$i_site ='';}
		if($post['i_daireno']){$i_daireno = ' / '.$post['i_daireno'];}
		if(isset($post['tel'])){$telefon = implode(', ',$post['tel']);}else{$telefon = '';}
		if(isset($post['cep'])){$gsm = implode(', ',$post['cep']);}else{$gsm = '';}
		$evadres = $i_semt.trim($post['i_mh']).' MAH. '.$i_cd.$i_sk.' NO:'.$post['i_kapino'].$i_daireno.' '.$post['i_ilce'].' / '.iladi($post['i_il']);
		/* /İkamet Bilgileri */

		/* Sağlık Bilgileri */		
		if(isset($post['eos'])){$eos = implode(',', $post['eos']);}else{$eos = '';}//engelin oluş sebebi
		if(isset($post['engl_grubu'])){$engl_grubu = implode(',', $post['engl_grubu']);}else{$engl_grubu = '';}//engel grubu	
		if(isset($post['engl_yakinligi'])){$engl_yakinligi = $post['engl_yakinligi'];}else{$engl_yakinligi = 'Kendisi';}
		/* /Sağlık Bilgileri */

		if(isset($post['gorev'])){$gorev = implode(',', $post['gorev']);}else{$gorev = '';}//Gönüllü görev
		if(isset($post['talep'])){$talep = implode(',', $post['talep']);}else{$talep = '';}
		if(isset($post['evrak'])){$evrak = implode(',', $post['evrak']);}else{$evrak = '';}//üye evrakları
		if($post['ofdsvy']){$ofdsvy = trim($post['ofdsvy']);}else{$ofdsvy='';}
		if(isset($post['engl_aciklamasi'])){$engl_aciklamasi = trim($post['engl_aciklamasi']);}else{$engl_aciklamasi='';}
		if(isset($post['okuladi'])){$okuladi = trim($post['okuladi']);}else{$okuladi='';}
		if(isset($post['notlar'])){$notlar = trim($post['notlar']);}else{$notlar='';}
		if(isset($post['acvt'])){$acvt = trim($post['acvt']);}else{$acvt='';}
		if(isset($post['ayrilmanedeni'])){$ayrilmanedeni = trim($post['ayrilmanedeni']);}else{$ayrilmanedeni='';}
		if(isset($post['guncelleme'])){$guncelleme = $post['guncelleme'];}else{$guncelleme='';}
		if(isset($post['is_adresi'])){$is_adresi = $post['is_adresi'];}else{$is_adresi='';}
		if(isset($post['ubt'])){$ubt = tcevir($post['ubt']);}else{$ubt='';}
		 
		DB::insert('uye',[
			'uyeno' => $post['uyeno'],
			'mtarih' => tcevir($post['mtarih']),
			'ubt' => $ubt,
			'uyetur' => $post['uyetur'],
			'tcno' => $post['tcno'],
			'adi' => trim($post['adi']),
			'soyadi' => trim($post['soyadi']),
			'isim' => $isim,
			'babaadi' => trim($post['babaadi']),
			'anneadi' => trim($post['anneadi']),
			'dyeri' => $post['dyeri'],
			'dtarih' => tcevir($post['dtarih']),
			'medenidurum' => $post['medenidurum'],
			'cinsiyeti' => $post['cinsiyeti'],
			'kangrub' => $post['kangrub'],
			'kutuk' => trim($post['kutuk']),
			'i_semt' => $i_semt,
			'i_mh' => $post['i_mh'],
			'i_cd' => $i_cd,
			'i_sk' => $i_sk,
			'i_site' => $i_site,
			'i_kapino' => trim($post['i_kapino']),
			'i_daireno' => trim($i_daireno),
			'i_ilce' => $post['i_ilce'],
			'i_il' => iladi($post['i_il']),
			'meslegi' => $post['meslegi'],
			'firmaadi' => $post['firmaadi'],
			'is_adresi' => $is_adresi,
			'gsm' => $gsm,
			'ev_tel' => $telefon,
			'is_tel' => $post['is_tel'],
			'is_fax' => $post['is_fax'],
			's_guvence' => $post['s_guvence'],
			'engl_grubu' => $engl_grubu,
			'engl_svy' => $post['engl_svy'],
			'engl_sebebi' => trim($post['engl_sebebi']),
			'ofdsvy' => $ofdsvy,
			'engl_aciklamasi' => $engl_aciklamasi,
			'engl_yakinligi' => $engl_yakinligi,
			'ogrenimdurumu' => $post['ogrenimdurumu'],
			'okuyormu' => $post['okuyormu'],
			'okuladi' => $okuladi,
			'sinif' => trim($post['sinif']),
			'ilgialani' => $post['ilgialani'],
			'talep' => $talep,
			'gorev' => $gorev,
			'notlar' => $notlar,
			'uyedurumu' => $post['uyedurumu'],
			'acvt' => $acvt,
			'ayrilmanedeni' => $ayrilmanedeni,
			'evadres' => $evadres,
			'eos' => $eos,
			'i_diger' => Session::select('dernekid').','.Session::select('kadi').','.$createDate,
			'evrak' => $evrak,
			'resimadet' => $post['resim'],
			'ukararno' => $post['ukararno'],
			'guncelleme' => $guncelleme,
			'dernekid' => Session::select('dernekid'),
		]);
		
			
		if (DB::affectedRows()) {redirect(P::link('uye/ara'));}else{
				$mesaj = 'DB NAME: uye. DB İşlem: Üye ekleme. HATA: '.DB::error();
				telegram($mesaj);
				alert('Programcıya hata ile ilgili bilgi gönderildi en kısa zamanda sorun halledilecektir.');
			}	
	}

	/* üye update */
	function uye_update($post){	
		$isim = trim($post['adi']).' '.trim($post['soyadi']);
		$createDate = date('Y-m-d');
		$guncelleme_tarihi = date('d-m-Y');

		/* İkamet Bilgileri */
		if($post['i_semt']){$i_semt = trim($post['i_semt']).' ';}else{$i_semt='';}
		if($post['i_cd']){$i_cd = trim($post['i_cd']);}else{$i_cd='';}
		if($post['i_sk']){$i_sk = trim($post['i_sk']);}else{$i_sk='';}
		if($post['i_site']){$i_site = trim($post['i_site']);}else{$i_site ='';}
		if($post['i_daireno']){$i_daireno = $post['i_daireno'];}else{$i_daireno = '';}
		//if(isset($post['tel'])){$telefon = implode(', ',$post['tel']);}else{$telefon = '';}
		//if(isset($post['cep'])){$gsm = implode(', ',$post['cep']);}else{$gsm = '';}
		
		$ev_tel = ($post['ev_tel'] == '(___) ___-__-__')?'':$post['ev_tel'];
		
		$evadres = $i_semt.trim($post['i_mh']).' MAH. '.$i_cd.$i_sk.' NO:'.$post['i_kapino'].'/'.$i_daireno.' '.ilceAdi($post['ilce']).' / '.iladi($post['il']);
		/* /İkamet Bilgileri */

		/* Sağlık Bilgileri */		
		if(isset($post['eos'])){$eos = implode(',', $post['eos']);}else{$eos = '';}//engelin oluş sebebi
		if(isset($post['engl_grubu'])){$engl_grubu = implode(',', $post['engl_grubu']);}else{$engl_grubu = '';}//engel grubu	
		if(isset($post['engl_yakinligi'])){$engl_yakinligi = $post['engl_yakinligi'];}else{$engl_yakinligi = 'Kendisi';}
		/* /Sağlık Bilgileri */

		if(isset($post['gorev'])){$gorev = implode(',', $post['gorev']);}else{$gorev = '';}//Gönüllü görev
		if(isset($post['talep'])){$talep = implode(',', $post['talep']);}else{$talep = '';}//üye talepleri
		if(isset($post['evrak'])){$evrak = implode(',', $post['evrak']);}else{$evrak = '';}//üye evrakları
		//if($post['ofdsvy']){$ofdsvy = trim($post['ofdsvy']);}else{$ofdsvy='';}
		if(isset($post['engl_aciklamasi'])){$engl_aciklamasi = trim($post['engl_aciklamasi']);}else{$engl_aciklamasi='';}
		if(isset($post['okuladi'])){$okuladi = trim($post['okuladi']);}else{$okuladi='';}
		if(isset($post['notlar'])){$notlar = trim($post['notlar']);}else{$notlar='';}
		if(isset($post['acvt'])){$acvt = trim($post['acvt']);}else{$acvt='';}
		if(isset($post['ayrilmanedeni'])){$ayrilmanedeni = trim($post['ayrilmanedeni']);}else{$ayrilmanedeni='';}
	
		if(isset($post['is_adresi'])){$is_adresi = $post['is_adresi'];}else{$is_adresi='';}
		if(isset($post['evrak'])){$evrak = implode(',', $post['evrak']);}else{$evrak = '';}//engelin oluş sebebi
		if(isset($post['dyeri'])){$dyeri = $post['dyeri'];}else{$dyeri = '';}
		//if(isset($post['ilce'])){$ilce = $post['ilce'];}else{$ilce = '';}
		//if(isset($post['il'])){$il = $post['il'];}else{$il = '';}

		

		DB::where('id', $post['id'])->update('uye',[
			'uyeno' 			=> $post['uyeno'],
			'mtarih' 			=> tcevir($post['mtarih']),
			'ubt' 				=> tcevir($post['ubt']),
			'uyetur' 			=> $post['uyetur'],
			'tcno' 				=> $post['tcno'],
			'adi' 				=> trim($post['adi']),
			'soyadi' 			=> trim($post['soyadi']),
			'isim'				=> $isim,
			'babaadi' 			=> trim($post['babaadi']),
			'anneadi' 			=> trim($post['anneadi']),
			'dyeri' 			=> $dyeri,
			'dtarih' 			=> tcevir($post['dtarih']),
			'medenidurum' 		=> $post['medenidurum'],
			'cinsiyeti' 		=> $post['cinsiyeti'],
			'kangrub' 			=> $post['kangrub'],
			'kutuk' 			=> trim($post['kutuk']),
			'i_semt' 			=> $i_semt,
			'i_mh' 				=> $post['i_mh'],
			'i_cd' 				=> $i_cd,
			'i_sk' 				=> $i_sk,
			'i_site' 			=> $i_site,
			'i_kapino' 			=> trim($post['i_kapino']),
			'i_daireno' 		=> $i_daireno,
			'i_ilce' 			=> $post['ilce'],
			'i_il' 				=> $post['il'],
			'calisiyormu'		=> $post['calisiyormu'],
			'meslegi' 			=> $post['meslegi'],
			'gsm' 				=> $post['gsm'],
			'ev_tel' 			=> $ev_tel,
			's_guvence' 		=> $post['s_guvence'],
			'engl_grubu' 		=> $engl_grubu,
			'engl_svy' 			=> $post['engl_svy'],
			'engl_sebebi' 		=> trim($post['engl_sebebi']),
			'engl_aciklamasi'	=> $engl_aciklamasi,
			'engl_yakinligi' 	=> $engl_yakinligi,
			'ogrenimdurumu' 	=> $post['ogrenimdurumu'],
			'okuyormu' 			=> $post['okuyormu'],
			'ilgialani'			=> $post['ilgialani'],
			'talep' 			=> $talep,
			'gorev' 			=> $gorev,
			'notlar' 			=> $notlar,
			'uyedurumu' 		=> $post['uyedurumu'],
			'acvt' 				=> $acvt,
			'ayrilmanedeni' 	=> $ayrilmanedeni,
			'evadres' 			=> $evadres,
			'eos' 				=> $eos,
			'evrak' 			=> $evrak,
			'resimadet' 		=> $post['resim'],
			'ukararno' 			=> $post['ukararno'],
			'guncelleme' 		=> $guncelleme_tarihi.' '.Session::select('kadi') 
		]);
		
			
		if (DB::affectedRows()) {redirect('uye');}
		//echo DB::error();

	}


	/* üye update */

	function aidat($post){
		return DB::orderBy('ay','ASC')->where('uyeno',$post)->get('aidat')->result();		
	}

	function uye_bilgi($post){

		return DB::select('adi,soyadi,tcno,uyeno,evadres,ubt,uyetur')->where('uyeno',$post)->get('uye')->row();

	}

	function uye_duzenle($post){
		return DB::where('id',$post)->get('uye')->row();
	}

	function uye_ara($post){

		if($post['uyeadi']){
			$isim = DB::select('adi,soyadi')->where('id',$post['uyeadi'])->get('uye')->row();
			logSave("$isim->adi $isim->soyadi araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,i_mh,i_cd,i_sk,i_site,i_kapino,i_daireno,i_ilce,i_il,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')->where('id',$post['uyeadi'])->get('uye')->result();
		}

			if($post['engl_aciklamasi']){
				$eng =$post['engl_aciklamasi'];
				return DB::query("SELECT id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih FROM uye WHERE engl_aciklamasi LIKE '%$eng%'")->result();
			/*
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')->whereLike('engl_aciklamasi',$post['engl_aciklamasi'])->get('uye')->result(); 
			*/
		}
		
		if($post['uyeno']){
			$isim = DB::select('adi,soyadi')->where('uyeno',$post['uyeno'])->get('uye')->row();
			
			$query = DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')->where('uyeno',$post['uyeno'])->get('uye')->result();

			if ($query) {
				logSave("$post[uyeno] no ile $isim->adi $isim->soyadi araması yaptı.");
				$sql = $query;
			}else{
				$sql = '';
				
			}

			return $sql;
		}
		
		if($post['uyedurumu']){
			logSave("$post[uyedurumu] üye durumu araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('uyedurumu',$post['uyedurumu'])
			->get('uye')
			->result();
		}

		if($post['uyetur']){
			logSave("$post[uyetur] üyelik türü araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('uyetur',$post['uyetur'])
			->get('uye')
			->result();
		}


		if($post['engelgrubu']){
			logSave("$post[engelgrubu] Engel grubu araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('engl_grubu',$post['engelgrubu'])
			->get('uye')
			->result();
		}

		if($post['ilce']){
			logSave("$post[ilce] İlçe araması yaptı.");
			return DB::orderBy('uyeno','asc')
			->select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->where("i_ilce LIKE","%$post[ilce]%", 'and')
			->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
			->get('uye')
			->result();
		}

		if($post['il']){
			logSave("$post[il] İl araması yaptı.");
			return DB::orderBy('uyeno','asc')
			->select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->where("i_il LIKE","%$post[il]%", 'and')
			->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
			->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
			->where('uyedurumu NOT LIKE','VEFAT', 'and')
			->where('uyedurumu NOT LIKE','AYRILDI', 'and')
			->get('uye')
			->result();
		}
	}


	function uye_ara1($post){

		if($post['uyeadi']){
			$isim = DB::select('adi,soyadi')->where('uyeno',$post['uyeadi'])->get('uye')->row();
			logSave("$isim->adi $isim->soyadi araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')->where('uyeno',$post['uyeadi'])->get('uye')->result();}
		
		if($post['uyeno']){
			$isim = DB::select('adi,soyadi')->where('uyeno',$post['uyeno'])->get('uye')->row();
			logSave("$post[uyeno] no ile $isim->adi $isim->soyadi araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')->where('uyeno',$post['uyeno'])->get('uye')->result();}
		
		if($post['uyedurumu']){
			logSave("$post[uyedurumu] üye durumu araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('uyedurumu',$post['uyedurumu'])
			->get('uye')
			->result();
		}

		if($post['uyetur']){
			logSave("$post[uyetur] üyelik türü araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('uyetur',$post['uyetur'])
			->get('uye')
			->result();
		}


		if($post['engelgrubu']){
			logSave("$post[engelgrubu] Engel grubu araması yaptı.");
			return DB::select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->orderBy('uyeno','asc')
			->where('engl_grubu',$post['engelgrubu'])
			->get('uye')
			->result();
		}

		if($post['ilce']){
			logSave("$post[ilce] İlçe araması yaptı.");
			return DB::orderBy('uyeno','asc')
			->select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->where("i_ilce LIKE","%$post[ilce]%", 'and')
			->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
			->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
			->where('uyedurumu NOT LIKE','VEFAT', 'and')
			->where('uyedurumu NOT LIKE','AYRILDI', 'and')
			->get('uye')
			->result();
		}

		if($post['il']){
			logSave("$post[il] İl araması yaptı.");
			return DB::orderBy('uyeno','asc')
			->select('id,adi,soyadi,tcno,uyeno,evadres,ubt,uyetur,ev_tel,gsm,dtarih,mtarih')
			->where("i_il LIKE","%$post[il]%", 'and')
			->where('uyetur NOT LIKE','ÜYE DEĞİL','and')
			->where('uyedurumu NOT LIKE','ÇIKARILDI', 'and')
			->where('uyedurumu NOT LIKE','VEFAT', 'and')
			->where('uyedurumu NOT LIKE','AYRILDI', 'and')
			->get('uye')
			->result();
		}
	}

	function aidatkaydet($post){
		$tarih = Myfnc::tarih($post['mkt'],'-');

		DB::insert('aidat',[
			'uyeno' => $post['uyeno'],
			'mkt' => $tarih,
			'mno' => $post['mn'],
			'mkesen' => $post['mk'],
			'ay' => $post['ay'],
			'au' => $post['au'],
			'dernekid' => Session::select('dernekid')
			]);
		redirect(P::link('uye/member_dues/'.$post['uyeno']));
	}
	/* aytb = AYNİ YARDIM TESLİM BELGESİ  */
	function aytb($p){
		return DB::orderBy('msira','desc')
		->where('adi',$p)
		->get('aytb')
		->result();
	}

	function onaylandi($post){
		DB::where('id', $post['id'])->update('uye',[
			'ukararno'	=> $post['kararno'],
			'uyeno'	=> $post['uyeno'],
			'ubt'	=> $post['ubt'],
			'notlar'	=> $post['not'],
			'uyedurumu' => 'AKTİF',
			]);
		redirect(P::link());
	}

	function onaylanmadi($post){
		DB::where('id', $post['id'])->update('uye',[
			'ukararno'	=> $post['kararno'],
			'notlar'	=> $post['not'],
			'uyedurumu' => 'RED EDİLDİ',
			]);
		redirect(P::link());
	}

	function talep(){
		return DB::orderBy('adi','asc')
		->where('dernekid',Session::select('dernekid'),'and')
		->where('durum','1')
		->get('malzeme')
		->result();
	}
	
}//class sonu