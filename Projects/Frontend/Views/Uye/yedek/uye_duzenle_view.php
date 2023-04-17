<?php import::view('header'); ?>
<style>.check label{float:left;margin-right: 15px;} </style>

<form class="form-horizontal" method="post" action="#">

	<!-- START ÜYE KİMLİK BİLGİLERİ -->
	<div class="widget-box">
		<div class="widget-title tooltips" id=""> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5>ÜYE KİMLİK BİLGİLERİ</h5>
			
		</div>
		<div class="widget-content nopadding" id="">

			<div class="control-group">
				<label class="control-label">TC	NO: </label>
				<div class="controls">
					<input type="text" name="tcno" id="tcno" value="<?php echo $dzn->tcno; ?> " maxlength="11"  class="span11" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required autofocus>

				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ADI: </label>
				<div class="controls">
					<input type="text" name="adi" value="<?php echo $dzn->adi; ?> " id=""  class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SOYADI: </label>
				<div class="controls">
					<input type="text" name="soyadi" id="" value="<?php echo $dzn->soyadi; ?> "  class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">BABA ADI: </label>
				<div class="controls">
					<input type="text" name="babaadi" value="<?php echo $dzn->babaadi; ?> " id="" class="span11" required >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ANNE ADI: </label>
				<div class="controls">
					<input type="text" name="anneadi" id="" value="<?php echo $dzn->anneadi; ?> " class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">DOĞUM TARİHİ: </label>
				<div class="controls">
					<input type="text" name="dtarih" value="<?php echo Myfnc::tarih($dzn->dtarih,'-'); ?>" id="dtarih"  class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">DOĞUM YERİ: </label>
				<div class="controls">
					<input type="text" name="dogumyeri" id="" value="<?php echo $dzn->dyeri; ?> " class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">KÜTÜK İL / İLÇE: </label>
				<div class="controls">
					<input type="text" name="kutuk" value="<?php echo $dzn->kutuk; ?> " id=""  class="span11" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">CİNSİYETİ: </label>
				<div class="controls">

					<select name="cinsiyet" id="" required>
						<option value="">SEÇİNİZ....</option>
						<option value="KADIN" <?php echo $dzn->cinsiyeti == 'KADIN'? 'selected':''; ?>>KADIN</option>
						<option value="ERKEK" <?php echo $dzn->cinsiyeti == 'ERKEK'? 'selected':''; ?>>ERKEK</option>
					</select> KAN GURUBU 
					<select name="kangrubu" required>
						<option value="">SEÇİNİZ...</option>
						<option value="BİLİNMİYOR" <?php echo $dzn->kangrub == 'BİLİNMİYOR'? 'selected':''; ?>>BİLİNMİYOR</option>
						<option value="A - RH" <?php echo $dzn->kangrub == 'A - RH'? 'selected':''; ?>>A - RH</option>
						<option value="A + RH" <?php echo $dzn->kangrub == 'A + RH'? 'selected':''; ?>>A + RH</option>
						<option value="B - RH" <?php echo $dzn->kangrub == 'B - RH'? 'selected':''; ?>>B - RH</option>
						<option value="B + RH" <?php echo $dzn->kangrub == 'B + RH'? 'selected':''; ?>>B + RH</option>
						<option value="AB - RH" <?php echo $dzn->kangrub == 'AB - RH'? 'selected':''; ?>>AB - RH</option>
						<option value="AB + RH" <?php echo $dzn->kangrub == 'AB + RH'? 'selected':''; ?>>AB + RH</option>
						<option value="0 - RH" <?php echo $dzn->kangrub == '0 - RH'? 'selected':''; ?>>0 - RH</option>
						<option value="0 + RH" <?php echo $dzn->kangrub == '0 + RH'? 'selected':''; ?>>0 + RH </option>
					</select> MEDENİ DURUMU 
					<select name="medenidurum" required>
						<option value="">SEÇİNİZ...</option>
						<option value="BİLİNMİYOR" <?php echo $dzn->medenidurum == 'BİLİNMİYOR'? 'selected':''; ?>>BİLİNMİYOR</option>
						<option value="BEKAR" <?php echo $dzn->medenidurum == 'BEKAR'? 'selected':''; ?>>BEKAR</option>
						<option value="EVLİ" <?php echo $dzn->medenidurum == 'EVLİ'? 'selected':''; ?>>EVLİ</option>
						<option value="DUL" <?php echo $dzn->medenidurum == 'DUL'? 'selected':''; ?> >DUL</option>
						<option value="BOŞANMIŞ" <?php echo $dzn->medenidurum == 'BOŞANMIŞ'? 'selected':''; ?>>BOŞANMIŞ</option>
					</select>

				</div>
			</div>
		</div>
	</div>
	<!-- STOP ÜYE KİMLİK BİLGİLERİ --> 


	<!-- START ÜYE İKAMET BİLGİLERİ -->
	<div class="widget-box">
		<div class="widget-title tooltips"> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5>ÜYE İKAMET BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding" >
			<div class="control-group">
				<label class="control-label">*İL : </label>
				<div class="controls">
				<select name="i_il" id="il_duzenle" class="span10" required>
					<option>Seçiniz...</option>
					<?php foreach (il_select_list() as $key): ?>
						<option value="<?php echo $key->CityID ?>" 

							<?php  echo  $key->CityName == $dzn->i_il? 'SELECTED':''; ?>

						><?php echo $key->CityName ?></option>
					<?php endforeach ?>
				</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*İLÇE : </label>
				<div class="controls">
				<input type="text" class="span11" name="i_ilce" value="<?php echo $dzn->i_ilce; ?>">
					
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">SEMT / KÖY: </label>
				<div class="controls">
					<input type="text" name="i_semt_koy" value="<?php echo $dzn->i_semt ?>  " class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA SEMT ADI YADA KÖY ADI">
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">*MAHALLE : </label>
				<div class="controls">
					<input type="text" name="i_mh" value="<?php echo $dzn->i_mh ?>  " class="span11" onkeypress="return BuyukHarf(event);" required placeholder="MAHALLE ADI ">
				</div>
				
				</div>
			

			<div class="control-group">
				<label class="control-label">CADDE: </label>
				<div class="controls">
					<input type="text" name="i_cd" id="" value="<?php echo $dzn->i_cd ?>  "  class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA CADDE ADI">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SOKAK: </label>
				<div class="controls">
					<input type="text" name="i_sk" id="" value="<?php echo $dzn->i_sk ?> " required onkeypress="return BuyukHarf(event);" class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SİTE ADI: </label>
				<div class="controls">
					<input type="text" name="i_site" value="<?php echo $dzn->i_site ?> " id="" onkeypress="return BuyukHarf(event);" class="span11">
				</div>
			</div>

			
			<div class="control-group">
				<label class="control-label">BİNA NO: </label>
				<div class="controls">
					<input type="text" name="i_kapino" id="" value="<?php echo $dzn->i_kapino ?> " required > DAİRE NO: <input type="text" value="<?php echo $dzn->i_daireno; ?> " name="i_daireno" id="" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON 1: </label>
				<div class="controls">
					<input type="text" name="telefon1" value="<?php echo $dzn->ev_tel ?>" id="tel1"  > <!--TELEFON 2:  
				 	<input type="text" name="telefon2" value="<?php echo $dzn->ev_tel ?> " id="tel2"  > -->
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">CEP TELEFON: </label>
				<div class="controls">
					<input type="text" name="cep1" value="<?php echo $dzn->gsm ?>" id="tel3"  ><!-- CEP TELEFON 2:  
					<input type="text" name="cep2" value="<?php echo $dzn->gsm ?>" id="tel4"  > -->
				</div>
			</div>

		</div>
	</div>
	<!-- STOP ÜYE İKAMET BİLGİLERİ -->

	
	<div class="widget-box">
		<div class="widget-title tooltips"> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5>ÜYE MESLEK BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">

			<div class="control-group" >
				<label class="control-label">MESLEĞİ: </label>
				<div class="controls">
					<input type="text" name="meslegi" value="<?php echo $dzn->meslegi ?>" id=""  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ÇALIŞTIĞI FİRMA ADI: </label>
				<div class="controls">
					<input type="text" name="firmaadi" value="<?php echo $dzn->firmaadi ?>" id=""  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">İL : </label>
				<div class="controls">
					<input type="text" name="is_il" id="" value="<?php echo $dzn->is_il ?>"  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">İLÇE : </label>
				<div class="controls">
					<input type="text" name="is_ilce" value="<?php echo $dzn->is_ilce ?>" id=""  class="span11">
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">MAHALLE: </label>
				<div class="controls">
					<input type="text" name="is_mah" value="<?php echo $dzn->is_mh ?>" id=""  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">CADDE: </label>
				<div class="controls">
					<input type="text" name="is_cd" value="<?php echo $dzn->is_cd ?>" id=""  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SOKAK: </label>
				<div class="controls">
					<input type="text" name="is_sk" value="<?php echo $dzn->is_sk ?>" id=""  class="span11">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SİTE ADI: </label>
				<div class="controls">
					<input type="text" name="is_site" id=""  class="span11">
				</div>
			</div>


			<div class="control-group">
				<label class="control-label">BİNA NO: </label>
				<div class="controls">
					<input type="text" name="is_kapino" value="<?php echo $dzn->is_kapino ?>" id=""  > KAPI NO: <input type="text" name="is_daireno" value="<?php echo $dzn->is_daireno ?>" id=""  >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON 1: </label>
				<div class="controls">
					<input type="text" name="is_telefon1" id="telefon1"  > FAX: <input type="text" name="is_fax" id="fax"  >
				</div>
			</div>

		</div>
	</div>


	<div class="widget-box">
		<div class="widget-title"> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5>ÜYE SAĞLIK BİLGİLERİ</h5>			
		</div>    
		<div class="widget-content nopadding" >

			<div class="control-group">
				<label class="control-label">SOSYAL GÜVENCESİ: </label>
				<div class="controls check">
					<label><input type="radio" name="s_guvence" value="BİLİNMİYOR"  <?php echo $dzn->s_guvence ==  'BİLİNMİYOR'? 'checked':''; ?>> BİLİNMİYOR</label>
					<label><input type="radio" name="s_guvence" value="SGK" <?php echo $dzn->s_guvence ==  'SGK'? 'checked':''; ?>>SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</label>
					<label><input type="radio" name="s_guvence" value="GSS" <?php echo $dzn->s_guvence ==  'GSS'? 'checked':''; ?>> GSS (YEŞİLKART, 2022)</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGELİN OLUŞ SEBEBİ: </label>
				<div class="controls check">
					<label><input type="checkbox" name="eos[]" value="KAZA" <?php echo $dzn->eos ==  'KAZA'? 'checked':''; ?>> KAZA</label>
					<label><input type="checkbox" name="eos[]" value="HASTALIK" <?php echo $dzn->eos ==  'HASTALIK'? 'checked':''; ?>> HASTALIK</label>
					<label><input type="checkbox" name="eos[]" value="DOĞUŞTAN" <?php echo $dzn->eos ==  'DOĞUŞTAN'? 'checked':''; ?>> DOĞUŞTAN</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGEL GRUBU: </label>
				<div class="controls check">
					<label><input type="checkbox" name="eng[]" value="BEDENSEL" <?php echo $dzn->engl_grubu ==  'BEDENSEL'? 'checked':''; ?>> BEDENSEL</label>
					<label><input type="checkbox" name="eng[]" value="GÖRME" <?php echo $dzn->engl_grubu ==  'GÖRME'? 'checked':''; ?>> GÖRME</label>
					<label><input type="checkbox" name="eng[]" value="ZİHİNSEL" <?php echo $dzn->engl_grubu ==  'ZİHİNSEL'? 'checked':''; ?>> ZİHİNSEL</label>
					<label><input type="checkbox" name="eng[]" value="İŞİTME" <?php echo $dzn->engl_grubu ==  'İŞİTME'? 'checked':''; ?>> İŞİTME</label>
					<label><input type="checkbox" name="eng[]" value="SÜREĞEN HASTALIK" <?php echo $dzn->engl_grubu ==  'SÜREĞEN HASTALIK'? 'checked':''; ?>> SÜREĞEN HASTALIK</label>
					<label><input type="checkbox" name="eng[]" value="HASTALIK" <?php echo $dzn->engl_grubu ==  'HASTALIK'? 'checked':''; ?>> HASTALIK</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGEL ORANI : </label>
				<div class="controls">

					<select name="englsvy" id="englsvy">
					<?php for ($i=40; $i <101 ; $i++) { ?>
						<option value="<?php echo $i; ?>"  <?php echo $dzn->engl_svy == $i? 'selected':''; ?>><?php echo $i; ?></option>
					<?php	} ?>
					</select> %
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">ENGEL SEBEBİ: </label>
					<div class="controls">
						<textarea class="span11" name="engl_sebebi" rows="5"><?php echo $dzn->engl_sebebi; ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">O.F'Lİ İSE SEVİYESİ: </label>
					<div class="controls">
						<input type="text" name="of_seviyesi" value="<?php echo $dzn->ofdsvy; ?>" class="span11" placeholder="OMURİLİK FELÇLİSİ İSE O.F SEVİYESİNİ YAZIN">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">ENGEL AÇIKLAMASI: </label>
					<div class="controls">
						<textarea name="engel_aciklamasi" class="span11" rows="5"><?php echo $dzn->engl_aciklamasi; ?></textarea>
					</div>
				</div>
			</div>    
		</div>

		<div class="widget-box">
			<div class="widget-title tooltips" > <span class="icon">  <i class="fa fa-th"></i> </span>
				<h5>ÜYE EĞİTİM BİLGİLERİ</h5>
			</div>
			<div class="widget-content nopadding">

				<div class="control-group">
					<label class="control-label">ÖĞRENİM DURUMU: </label>
					<div class="controls">
						<select name="ogrenimdurumu" >
							<option value="">SEÇİNİZ...</option>
							<option value="OKUMA YAZMA  BİLMİYOR" <?php echo $dzn->ogrenimdurumu ==  'OKUMA YAZMA  BİLMİYOR'? 'selected':''; ?>>OKUMA YAZMA BİLMİYOR</option>
							<option value="OKUR YAZAR" <?php echo $dzn->ogrenimdurumu ==  'OKUR YAZAR'? 'selected':''; ?>>OKUR YAZAR</option>
							<option value="ÖZEL EĞİTİM" <?php echo $dzn->ogrenimdurumu ==  'ÖZEL EĞİTİM'? 'selected':''; ?>>ÖZEL EĞİTİM</option>
							<option value="İLKOKUL" <?php echo $dzn->ogrenimdurumu ==  'İLKOKUL'? 'selected':''; ?>>İLKOKUL</option>
							<option value="ORTAOKUL" <?php echo $dzn->ogrenimdurumu ==  'ORTAOKUL'? 'selected':''; ?>>ORTAOKUL</option>
							<option value="İLKÖĞRETİM" <?php echo $dzn->ogrenimdurumu ==  'İLKÖĞRETİM'? 'selected':''; ?>>İLKÖĞRETİM</option>
							<option value="LİSE" <?php echo $dzn->ogrenimdurumu ==  'LİSE'? 'selected':''; ?>>LİSE</option>
							<option value="ÜNİVERSİTE" <?php echo $dzn->ogrenimdurumu ==  'ÜNİVERSİTE'? 'selected':''; ?>>ÜNİVERSİTE</option>
						</select> HALEN OKUYORMU? 
						<select name="okuyormu" class="textarea" id="okuyormu">
							<option value="" <?php echo $dzn->okuyormu ==  ''? 'selected':''; ?>>BİLİNMİYOR</option>
							<option value="EVET" <?php echo $dzn->okuyormu ==  'EVET'? 'selected':''; ?>>EVET</option>
							<option value="HAYIR" <?php echo $dzn->okuyormu ==  'HAYIR'? 'selected':''; ?>>HAYIR</option>
							<option value="TERK" <?php echo $dzn->okuyormu ==  'TERK'? 'selected':''; ?>>TERK</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">OKUL ADI: </label>
					<div class="controls">

						<input type="text" name="okul_adi" value="<?php echo $dzn->okuladi ?>" id=""  class="span5"> SINIFI YADA BÖLÜMÜ: <input type="text" name="sinif" id="" value="<?php echo $dzn->sinif ?>" class="span5">
					</div>
				</div>
			</div>
		</div>

		<div class="widget-box">
			<div class="widget-title tooltips" > <span class="icon"> <i class="fa fa-th"></i> </span>
				<h5>ÜYE DİĞER BİLGİLERİ</h5>
			</div>
			<div class="widget-content nopadding">

				<div class="control-group">
					<label class="control-label">İLGİL ALANLARI: </label>
					<div class="controls">
						<textarea name="ilgialani"  class="span11" rows="5"><?php echo $dzn->ilgialani ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">NOT: </label>
					<div class="controls">
						<textarea name="not" class="span11" rows="5"><?php echo $dzn->notlar ?></textarea>
					</div>
				</div>

				<div class="control-group">
					<div class="container check">
						<label>AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?: </label><br><br>
						<label><input type="checkbox" name="gorev[]" value="HAYIR" <?php echo $dzn->gorev ==  'HAYIR'? 'checked':''; ?>> HAYIR</label>
						<label><input type="checkbox" name="gorev[]" value="HAFTA İÇİ" <?php echo $dzn->gorev ==  'HAFTA İÇİ'? 'checked':''; ?>> HAFTA İÇİ</label>
						<label><input type="checkbox" name="gorev[]" value="HAFTA SONU" <?php echo $dzn->gorev ==  'HAFTA SONU'? 'checked':''; ?>> HAFTA SONU</label>
						<label><input type="checkbox" name="gorev[]" value="HERHANGİ BİR GÜN" <?php echo $dzn->gorev ==  'HERHANG BİR GÜN'? 'checked':''; ?>> HERHANGİ BİR GÜN</label>
						<label><input type="checkbox" name="gorev[]" value="GÖNÜLLÜ" <?php echo $dzn->gorev ==  'GÖNÜLLÜ'? 'checked':''; ?>> GÖNÜLLÜ (BELLİ ZAMANLARDA GÖREV ALABİLİRİM) </label>


					</div>
				</div>
			</div>
		</div>

		<?php 
		$par =  group('ÜYE MÜRACAAT TARİHİ:',input_date('mtarih',$dzn->mtarih,'2').' ÜYE MÜRACAAT TARİHİNİ GİRİN...').
				group('ÜYELİK BAŞLANGIÇ TARİHİ:',input_date('ubt',$dzn->ubt,'2').' ÜYELİK BAŞLANGIÇ TARİHİNİ GİRİN...').
				group('ÜYENO :',input_text('uyeno',$dzn->uyeno,'2')).
				group('ÜYELİK KARAR NO:',input_text('kararno',$dzn->ukararno,'2').' ÜYE HAKKINDA BİRDEN FAZLA KARAR VARSA VİRGÜLLE AYIRARAK YAZIN 345,346,555 GİBİ').
				group('ÜYELİK TÜRÜ',select('uyetur',[
					'SEÇİNİZ' => ' ',
					'ENGELLİ ÜYE' =>'ENGELLİ ÜYE',
					'SAĞLAM ÜYE' =>'SAĞLAM ÜYE',
					'ENGELLİ VASİSİ' =>'ENGELLİ VASİSİ',
					'ÜYE DEĞİL' =>'ÜYE DEĞİL'],'2',$dzn->uyetur).' ÜYELİK TÜRÜNÜ SEÇİN...').
				group('ÜYE DURUMU',select('uyedurumu',[
					'SEÇİNİZ' => ' ',
					'AKTİF' =>'AKTİF',
					'ONAY BEKLİYOR' =>'ONAY BEKLİYOR',
					'VEFAT' =>'VEFAT',
					'AYRILDI' =>'AYRILDI',
					'ÇIKARILDI' =>'ÇIKARILDI'],'2',$dzn->uyedurumu).' ÜYENİN GÜNCEL DURUMUNU SEÇİN...').
	 			group('DURUM TARİHİ:',input_date('acvt',$dzn->acvt,'2').' AYRILMA, ÇIKARILMA YADA VEFAT TARİHİNİ GİRİN').
	 			group('AYRILMA NEDENİ:',input_text('ayrilma_nedeni'));

		echo box('ÜYE DERNEK AYARLARI',$par); 


		?>
		<!-- GEREKLİ EVRAKLAR -->
		<div class="widget-box" id="evrak">
			<div class="widget-title"> <span class="icon"> <i class="fa fa-signal"></i> </span>
				<h5>GEREKLİ EVREKLAR</h5>
			</div>
			<div class="widget-content">
			<div class="control-group">
					<label class="control-label">RESİM: </label>
					<div class="controls">
						<select name="resim" id="" required>
							<option value="">Seçin</option>
							<option value="0" <?php echo $dzn->resimadet == '0' ? 'selected':''; ?>>Resim yok</option>
							<option value="1" <?php echo $dzn->resimadet == '1' ? 'selected':''; ?>>1 Resim</option>
							<option value="2" <?php echo $dzn->resimadet == '2' ? 'selected':''; ?>>2 Resim</option>
							<option value="3" <?php echo $dzn->resimadet == '3' ? 'selected':''; ?>>3 Resim</option>
							<option value="4" <?php echo $dzn->resimadet == '4' ? 'selected':''; ?>>4 Resim</option>
						</select> Aday resim getirdiyse adedini seçin,resim getirmediyse resim yoku seçin.<br> Aşağıdaki evrakları getirdiyse getirdiği evrakı seçin.<br><strong>( Var Olan Evrakları: <?php 
							$arr = explode(',', $dzn->evrak);
							foreach ($arr as $key ) { ?>



							<?php
								}

							 ?> )</strong>
						
						<label><input type="checkbox" name="evrak[]" <?php echo 'İKAMTGAH' ?> value="İKAMETGAH"> İKAMETGAH</label>
						<label><input type="checkbox" name="evrak[]" value="NÜFUS CÜZDANI FOTOKOPİSİ"> NÜFUS CÜZDANI FOTOKOPİSİ</label> 
						<label><input type="checkbox" name="evrak[]" value="ENGELLİ RAPORU"> ENGELLİ RAPORU</label>
						
					</div>
				</div>
				
			</div>
		</div>
		<!-- /GEREKLİ EVRAKLAR -->

		EN SON GÜNCELLEME TARİHİ: <?php echo $dzn->guncelleme; ?>
		<?php 

			echo input_hidden('id',$dzn->id).button('ÜYE GÜNCELLEŞTİRMESİNİ TAMAMLA');
		?>
		
</form>
<hr>
<a href="<?php echo baseUrl(Session::select('path').'/uye/uyesil/'.$dzn->id); ?>" class="btn btn-danger" onclick="return confirm('Bu Kaydı Silmek istediğinize eminmisiniz?')">ÜYE KAYDINI SİL</a>
<?php import::view('footer'); ?>