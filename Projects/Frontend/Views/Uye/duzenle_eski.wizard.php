<form action="#" method="post">


<!-- / ÜYELİK TÜRÜ BİLGİLERİ -->	

<!-- ÜYE KİMLİK BİLGİLERİ -->
<div class="widget-box" id="kimlik_bilgileri" style="display:none;">
	<div class="widget-title" ><i class="fa fa-th"></i><h5> KİMLİK BİLGİLERİ</h5></div>
	<div class="widget-content nopadding">
		<div class="control-group">
			<label class="control-label">*TC	NO: </label>
			<div class="controls">
				<input type="text"  name="tcno" id="tcno" value="" maxlength="11"  class="span11" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">*ADI: </label>
			<div class="controls">
				<input type="text" name="adi" value="" id=""  class="span6 buyuk char" required> *SOYADI: <input type="text" name="soyadi" id="" value=""  class="span5 buyuk" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">*BABA ADI: </label>
			<div class="controls">
				<input type="text" name="babaadi" value="" id="" class="span6 buyuk char" required > *ANNE ADI: <input type="text" name="anneadi" id="" value="" class="span5 buyuk char" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">*DOĞUM TARİHİ: </label>
			<div class="controls">
				<div class="rows">
					<input type="text" name="dtarih" value="" id="dtarih"  class="span2" required> *DOĞUM YERİ: 
					<input type="text" name="dyeri" value="" class="span4 buyuk" required> *KÜTÜK İL / İLÇE: 
					<input type="text" name="kutuk" value="" class="span4 buyuk"  required>
				</div></div>
			</div>			
			<div class="control-group">
				<label class="control-label">*CİNSİYETİ: </label>
				<div class="controls">
					<select name="cinsiyeti" required>
						<option value="">SEÇİNİZ....</option>
						<option value="KADIN">KADIN</option>
						<option value="ERKEK">ERKEK</option>
					</select> KAN GURUBU 
					<select name="kangrub" >
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="A - RH" >A - RH</option>
						<option value="A + RH" >A + RH</option>
						<option value="B - RH" >B - RH</option>
						<option value="B + RH" >B + RH</option>
						<option value="AB - RH">AB - RH</option>
						<option value="AB + RH">AB + RH</option>
						<option value="0 - RH" >0 - RH</option>
						<option value="0 + RH" >0 + RH </option>
					</select> MEDENİ DURUMU 
					<select name="medenidurum" required>
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="BEKAR">BEKAR</option>
						<option value="EVLİ">EVLİ</option>
						<option value="DUL">DUL</option>
						<option value="BOŞANMIŞ">BOŞANMIŞ</option>
					</select>
				</div>
			</div>
		</div>
	</div> 
	<!-- / KİMLİK BİLGİLERİ -->

	<!--  İKAMET BİLGİLERİ -->	
	<div class="widget-box" id="ikamet_bilgileri" style="display:none;">
		<div class="widget-title"> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5> İKAMET BİLGİLERİ</h5>			
		</div>
		<div class="widget-content nopadding" >
			<div class="control-group">
				<label class="control-label">*İL : </label>
				<div class="controls">
					<select name="i_il" id="il" class="span5" required>
						<option>SEÇİNİZ...</option>						
					</select> *İLÇE
					<select name="i_ilce" id="ilce" class="span6" required >
						<option>ÖNCE İLİ SEÇİN...</option>
					</select>					
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SEMT / KÖY: </label>
				<div class="controls">
					<input type="text" name="i_semt" value="" class="span11 buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">*MAHALLE : </label>
				<div class="controls">
					<input type="text" name="i_mh" value="" class="span11 buyuk"  required placeholder="SADECE MAHALLE ADINI YAZIN ">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">CADDE: </label>
				<div class="controls">
					<input type="text" name="i_cd" id="" value=""  class="span11 buyuk"  placeholder="VARSA SADECE CADDE ADINI YAZIN">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*SOKAK: </label>
				<div class="controls">
					<input type="text" name="i_sk" id="" value="" required  class="span11 buyuk" placeholder="SADECE SOKAK ADINI YAZIN">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SİTE ADI: </label>
				<div class="controls">
					<input type="text" name="i_site" value=""   class="span11 buyuk">
				</div>
			</div>


			<div class="control-group">
				<label class="control-label">*BİNA NO: </label>
				<div class="controls">
					<input type="text" name="i_kapino"  id="i_kapino" value="1" class="span1" required > DAİRE NO: 
					<input type="text" name="i_daireno" id="i_daireno" value="1" class="span1" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON 1: </label>
				<div class="controls">
					<input type="text" name="tel[]" class="span2" value="" id="tel1"  > TEL2 <input type="text" name="tel[]" class="span2" value="" id="tel2"  > 
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*CEP TELEFON: </label>
				<div class="controls">
					<input type="text" name="cep[]" class="span2" value="" id="tel3" required> CEP2: <input type="text" name="cep[]" class="span2" value="" id="tel4"  >
				</div>
			</div>

		</div>
	</div>
	<!-- / İKAMET BİLGİLERİ -->

	<!--  MESLEK BİLGİLERİ -->
	<div class="widget-box" id="meslek_bilgileri" style="display:none;">
		<div class="widget-title"> <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5> MESLEK BİLGİLERİ</h5>			
		</div>
		<div class="widget-content nopadding" >

			<div class="control-group" >
				<label class="control-label">ÇALIŞIYORMU: </label>
				<div class="controls">
					<select name="calisiyormu" id="calisiyormu" class="span11">
						<option value="EVET">EVET</option>
						<option value="HAYIR" selected>HAYIR</option>
						<option value="EMEKLİ">EMEKLİ</option>
					</select>
				</div>
			</div>

			<div id="meslek">
				<div class="control-group" >
					<label class="control-label">MESLEĞİ: </label>
					<div class="controls">
						<input type="text" name="meslegi" value="" id="meslek"  class="span11 meslek"  >
					</div>
				</div>
			</div>

			<div id="calisma" style="display: none;">
				<div class="control-group">
					<label class="control-label">ÇALIŞTIĞI FİRMA ADI: </label>
					<div class="controls">
						<input type="text" name="firmaadi" value="" id="firma"  class="span11">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">İş ADRESİ : </label>
					<div class="controls">
						<input name="is_adresi" class="span11" id="" cols="30" rows="10">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">TELEFON 1: </label>
					<div class="controls">
						<input type="text" name="is_tel" class="span2" id="tel5"  > FAX: 
						<input type="text" name="is_fax" class="span2" id="tel6"   >
					</div>
				</div>

			</div>
			
		</div>
	</div>
	<!-- / MESLEK BİLGİLERİ -->

	<!--  SAĞLIK BİLGİLERİ -->
	<div class="widget-box" id="saglik_bilgileri" style="display:none;">
		<div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5> SAĞLIK BİLGİLERİ</h5>
		</div>    
		<div class="widget-content nopadding" >

			<div class="control-group">
				<label class="control-label">SOSYAL GÜVENCESİ: </label>	
				<div class="controls check">			
					<label><input type="radio" name="s_guvence" value="BİLİNMİYOR" > BİLİNMİYOR</label>
					<label><input type="radio" name="s_guvence" value="SGK" checked>SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</label>
					<label><input type="radio" name="s_guvence" value="GSS"> GSS (YEŞİLKART, 2022)</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGELİN OLUŞ SEBEBİ: </label>
				<div class="control-group">

					<div class="controls check">
						<label><input type="checkbox" name="eos[]" value="KAZA"> KAZA</label>
						<label><input type="checkbox" name="eos[]" value="HASTALIK"> HASTALIK</label>
						<label><input type="checkbox" name="eos[]" value="DOĞUŞTAN"> DOĞUŞTAN</label>
					</div>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGEL GRUBU: </label>
				<div class="controls check">
					
					<label><input type="checkbox" name="engl_grubu[]" value="BEDENSEL" > BEDENSEL</label>
					<label><input type="checkbox" name="engl_grubu[]" value="GÖRME" > GÖRME</label>
					<label><input type="checkbox" name="engl_grubu[]" value="ZİHİNSEL" > ZİHİNSEL</label>
					<label><input type="checkbox" name="engl_grubu[]" value="İŞİTME" > İŞİTME</label>
					<label><input type="checkbox" name="engl_grubu[]" value="SÜREĞEN HASTALIK"> SÜREĞEN HASTALIK</label>
					<label><input type="checkbox" name="engl_grubu[]" value="HASTALIK" > HASTALIK</label>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGEL ORANI : </label>
				<div class="controls">

					<select name="engl_svy" id="englsvy">
						<option value="0">SEÇİNİZ...</option>
						{[ for ($i=40; $i <101 ; $i++) { ]}
						<option value="{[ echo $i; ]}" >{[ echo $i; ]}</option>
						{[	} ]}
					</select> %
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGELLİ İLE YAKINLIĞI: </label>
				<div class="controls">
					<input type="text" name="engl_yakinligi" value="KENDİSİ" class="span11" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ENGEL SEBEBİ: </label>
				<div class="controls">
					<textarea class="span11" name="engl_sebebi" rows="5"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">O.F'Lİ İSE SEVİYESİ: </label>
				<div class="controls">
					<input type="text" name="ofdsvy" value="" class="span11" placeholder="OMURİLİK FELÇLİSİ İSE O.F SEVİYESİNİ YAZIN">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">ENGEL AÇIKLAMASI: </label>
				<div class="controls">
					<textarea name="engl_aciklamasi" class="span11" rows="5"></textarea>
				</div>
			</div>
		</div>    
	</div>
	<!-- / SAĞLIK BİLGİLERİ -->

	<!--  EĞİTİM BİLGİLERİ -->
	<div class="widget-box" id="egitim_bilgileri" style="display:none;">
		<div class="widget-title" > <span class="icon">  <i class="fa fa-th"></i> </span>
			<h5> EĞİTİM BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding" >
			<div class="control-group">
				<label class="control-label">ÖĞRENİM DURUMU: </label>
				<div class="controls">
					<select name="ogrenimdurumu" >
						<option value="">SEÇİNİZ...</option>
						<option value="OKUMA YAZMA  BİLMİYOR">OKUMA YAZMA BİLMİYOR</option>
						<option value="OKUR YAZAR" >OKUR YAZAR</option>
						<option value="ÖZEL EĞİTİM" >ÖZEL EĞİTİM</option>
						<option value="İLKOKUL" >İLKOKUL</option>
						<option value="ORTAOKUL" >ORTAOKUL</option>
						<option value="İLKÖĞRETİM" >İLKÖĞRETİM</option>
						<option value="LİSE" >LİSE</option>
						<option value="ÜNİVERSİTE" >ÜNİVERSİTE</option>
					</select> HALEN OKUYORMU? 
					<select name="okuyormu" class="teCxtarea" id="okuyormu">
						<option value="" >BİLİNMİYOR</option>
						<option value="EVET" >EVET</option>
						<option value="HAYIR" >HAYIR</option>
						<option value="TERK" >TERK</option>
					</select>
				</div>
			</div>
			<div id="okuma" style="display: none;">
				<div class="control-group">
					<label class="control-label">OKUL ADI: </label>
					<div class="controls">
						<input type="text" name="okul_adi" value="" class="span5"> SINIFI YADA BÖLÜMÜ: 
						<input type="text" name="sinif" value="" class="span5">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- / EĞİTİM BİLGİLERİ -->

	<!--  DİĞER BİLGİLERİ -->
	<div class="widget-box" id="diger_bilgiler" style="display:none;">
		<div class="widget-title" > <span class="icon"> <i class="fa fa-th"></i> </span>
			<h5> DİĞER BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding" >
			<div class="control-group">
				<label class="control-label">İLGİL ALANLARI: </label>
				<div class="controls">
					<textarea name="ilgialani"  class="span11" rows="5"></textarea>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">NOT: </label>
				<div class="controls">
					<textarea name="not" class="span11" rows="5"></textarea>
				</div>
			</div>		
		</div>
	</div>
	<!-- / DİĞER BİLGİLERİ -->

	<!--  AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?: -->
	<div class="widget-box" id="gorev" style="display:none;" >
		<div class="widget-title" > <span class="icon"> <i class="fa fa-th"></i> </span>
			<h5> AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ? </h5>
		</div>
		<div class="widget-content nopadding" >
			<div class="control-group">
				<label class="control-label"> </label>
				<div class="controls check">
					<label><input type="checkbox" name="gorev[]" value="HAYIR" > HAYIR</label>
					<label><input type="checkbox" name="gorev[]" value="HAFTA İÇİ"> HAFTA İÇİ</label>
					<label><input type="checkbox" name="gorev[]" value="HAFTA SONU" > HAFTA SONU</label>
					<label><input type="checkbox" name="gorev[]" value="HERHANGİ BİR GÜN" > HERHANGİ BİR GÜN</label>
					<label><input type="checkbox" name="gorev[]" value="GÖNÜLLÜ" > GÖNÜLLÜ (BELLİ ZAMANLARDA GÖREV ALABİLİRİM) </label>
				</div>
			</div>
		</div>
	</div>	
	<!-- / AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?: -->

	<!-- GEREKLİ EVRAKLAR -->
	<div class="widget-box" id="evrak" style="display:none;">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-signal"></i> </span>
			<h5>GEREKLİ EVREKLAR ( Aday resim getirdiyse adedini seçin. Aşağıdaki hangi belgeleri getirdiyse, getirdiği belgeleri seçin.)</h5>
		</div>
		<div class="widget-content">
			<div class="control-group">
				<label class="control-label">RESİM: </label>
				<div class="controls">
					<select name="resim" id="">
						<option value="0" selected >Resim yok</option>
						<option value="1" >1 Resim</option>
						<option value="2" >2 Resim</option>
						<option value="3" >3 Resim</option>
						<option value="4" >4 Resim</option>
					</select> 

					<label><input type="checkbox" name="evrak[]" value="İKAMETGAH"> İKAMETGAH</label>
					<label><input type="checkbox" name="evrak[]" value="NÜFUS CÜZDANI FOTOKOPİSİ"> NÜFUS CÜZDANI FOTOKOPİSİ</label> 
					<label><input type="checkbox" name="evrak[]" value="ENGELLİ RAPORU"> ENGELLİ RAPORU</label>

				</div>
			</div>

		</div>
	</div>
	<!-- /GEREKLİ EVRAKLAR -->

	<!--  TALEBİ -->
	<div class="widget-box" id="talebi" style="display:none;">
		<div class="widget-title"  id="ut_btn">
			<span class="icon"><i class="fa fa-th"></i></span>
			<h5> TALEBİ</h5>				
		</div>
		<div class="widget-content"  style="overflow: auto;">
			{[ foreach (talep() as $key) {]}
			<label><div class="check1">
				<input type="checkbox" name="talep[]" value="{[ echo $key->adi ]}"> {[ echo $key->adi ]}
			</div></label>
			{[ } ]}

		</div>
	</div>
	<!--  TALEBİ -->	

	<button type="submit" class="btn btn-primary btn-block" id="saveBtn" style="display: none;"><b>KAYDET</b></button> 
</form>
