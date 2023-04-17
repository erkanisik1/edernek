<form action="#" method="post">

	<div class="card border-top-0 border-primary rounded">
		<div class="card-status-top bg-primary"></div>
		<div class="card-body">
			<button type="submit" class="btn btn-success">Kaydet</button> <button type="submit" class="btn btn-primary">Kaydet ve kapat</button> <button type="submit" class="btn btn-danger">Vazgeç</button>
		</div>
	</div>


	<div class="card mt-2 ">
		<div class="card-status-top bg-danger"></div>
		<div class="card-body">

			<div class="mb-3">
				<label class="form-label">ÜYELİK TÜRÜ: </label>
				<select name="uyetur" id="uyetur" class="form-select">
					<option value="">Seçiniz...</option> 
					<option value="ENGELLİ ÜYE" {[ selected('ENGELLİ ÜYE', uye_edit($id)->uyetur) ]}>ENGELLİ ÜYE</option>
					<option value="SAĞLAM ÜYE" {[ selected('SAĞLAM ÜYE', uye_edit($id)->uyetur) ]}>SAĞLAM ÜYE</option>
					<option value="ENGELLİ VASİSİ" {[ selected('ENGELLİ VASİSİ', uye_edit($id)->uyetur) ]}>ENGELLİ VASİSİ</option>
					<option value="ÜYE DEĞİL" {[ selected('ÜYE DEĞİL', uye_edit($id)->uyetur) ]}>ÜYE DEĞİL</option>
				</select>	


			</div>

			<div class="mb-3" id="bt">
				<div class="row">
					<div class="col-4 mb-3">
						<label class="form-label">BAŞVURU TARİHİ </label>
						<input type="text" name="mtarih" class="form-control" value="{{tcevir(uye_edit($id)->mtarih)}}" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
					</div>

					<div class="col-4 mb-3">
						<label class="form-label">ÜYELİK KABUL TARİHİ</label>
						<input type="text" name="ubt" class="form-control" value="{{tcevir(uye_edit($id)->ubt)}}" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
					</div>

					<div class="col-4 mb-3">
						<label class="form-label">ÜYELİK DURUMU</label>
						<select name="uyedurumu" id="uyedurumu" class="form-select uyedurumu1" required autofocus>
							<option value="ONAY BEKLİYOR" {{selected('ONAY BEKLİYOR',uye_edit($id)->uyedurumu)}} >ONAY BEKLİYOR</option>
							<option value="AKTİF" {{selected('AKTİF',uye_edit($id)->uyedurumu)}}>AKTİF</option>
							<option value="VEFAT" {{selected('VEFAT',uye_edit($id)->uyedurumu)}}>VEFAT</option>
							<option value="AYRILDI" {{selected('AYRILDI',uye_edit($id)->uyedurumu)}}>AYRILDI</option>
							<option value="ÇIKARILDI"{{selected('ÇIKARILDI',uye_edit($id)->uyedurumu)}} >ÇIKARILDI</option>	
							<option value="ÜYE DEĞİL" {{selected('ÜYE DEĞİL',uye_edit($id)->uyedurumu)}}>ÜYE DEĞİL</option>
						</select>	
					</div>

					<div id="onay">
						<div class="row">
							<div class="col-6">
								<label class="form-label">ÜYELİK NO </label>

								<input type="text" name="uyeno"  class="form-control" value="{{uye_edit($id)->uyeno}}" >
							</div>
							<div class="col-6">
								<label class="form-label">KARAR NO</label>
								<input type="text" name="ukararno"  class="form-control" value="{{uye_edit($id)->ukararno}}" > 
							</div>
						</div>
					</div>	
				</div>
			</div>

		</div>
	</div>

	<div class="card mt-2" id="kimlik_bilgileri" >
		<div class="card-header">
			<h4 class="card-title">Kimlik Bilgileri</h4>      			
		</div>
		<div class="card-body">
			<div class="mt-3">
				<label class="form-label">*TC NO </label>
				<input type="text"  name="tcno" id="tcno" value="{[ echo uye_edit($id)->tcno ]}" maxlength="11"  class="form-control" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">*ADI </label>
						<input type="text" name="adi" value="{[ echo uye_edit($id)->adi ]}" id=""  class="form-control buyuk char" required> 
					</div>
					<div class="col-6">
						<label class="form-label">*SOYADI </label>
						<input type="text" name="soyadi" id="" value="{[ echo uye_edit($id)->soyadi ]}"  class="form-control buyuk" required>
					</div>
				</div>					
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">*BABA ADI </label>
						<input type="text" name="babaadi" value="{[ echo uye_edit($id)->babaadi ]}" id=""  class="form-control buyuk char" required> 
					</div>
					<div class="col-6">
						<label class="form-label">*ANNE ADI </label>
						<input type="text" name="anneadi" id="" value="{{uye_edit($id)->anneadi}}"  class="form-control buyuk" required>
					</div>
				</div>					
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-4">
						<label class="control-label">DOĞUM TARİHİ</label>
						<input type="text" name="Dtarih" value="{{tcevir(uye_edit($id)->dtarih)}}" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
					</div>
					<div class="col-4">
						<label class="control-label">DOĞUM YERİ</label>
						<input type="text" name="dyeri" value="{{uye_edit($id)->dyeri}}" class="form-control buyuk" required>
					</div>
					<div class="col-4">
						<label class="control-label">KÜTÜK İL / İLÇE</label>
						<input type="text" name="kutuk" value="{{uye_edit($id)->kutuk}}" class="form-control buyuk" required>
					</div>
				</div>
			</div>   
			<div class="mt-3">
				<div class="row">
					<div class="col-4">
						<label class="control-label">Cinsiyeti</label>
						<select name="cinsiyeti" class="form-select" required>
							<option value="">SEÇİNİZ....</option>
							<option value="KADIN" {[ selected('KADIN', uye_edit($id)->cinsiyeti) ]} >KADIN</option>
							<option value="ERKEK" {[ selected('ERKEK', uye_edit($id)->cinsiyeti) ]} >ERKEK</option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label">Kan Grubu</label>
						<select name="kangrub" class="form-select" >
							<option value="BİLİNMİYOR" {[ selected('BİLİNMİYOR', uye_edit($id)->kangrub) ]}>BİLİNMİYOR</option>
							<option value="A - RH" {[ selected('A - RH', uye_edit($id)->kangrub) ]}>A - RH</option>
							<option value="A + RH" {[ selected('A + RH', uye_edit($id)->kangrub) ]}>A + RH</option>
							<option value="B - RH" {[ selected('B - RH', uye_edit($id)->kangrub) ]}>B - RH</option>
							<option value="B + RH" {[ selected('B + RH', uye_edit($id)->kangrub) ]}>B + RH</option>
							<option value="AB - RH"{[ selected('AB - RH', uye_edit($id)->kangrub) ]}>AB - RH</option>
							<option value="AB + RH"{[ selected('AB + RH', uye_edit($id)->kangrub) ]}>AB + RH</option>
							<option value="0 - RH" {[ selected('0 - RH', uye_edit($id)->kangrub) ]}>0 - RH</option>
							<option value="0 + RH" {[ selected('0 + RH', uye_edit($id)->kangrub) ]}>0 + RH </option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label">Medeni Durumu</label>
						<select name="medenidurum" class="form-control" required>
							<option value="">SEÇİNİZ...</option>
							<option value="BİLİNMİYOR"{[ selected('BİLİNMİYOR', uye_edit($id)->medenidurum) ]}>BİLİNMİYOR</option>
							<option value="BEKAR"{[ selected('BEKAR', uye_edit($id)->medenidurum) ]}>BEKAR</option>
							<option value="EVLİ"{[ selected('EVLİ', uye_edit($id)->medenidurum) ]}>EVLİ</option>
							<option value="DUL"{[ selected('DUL', uye_edit($id)->medenidurum) ]}>DUL</option>
							<option value="BOŞANMIŞ"{[ selected('BOŞANMIŞ', uye_edit($id)->medenidurum) ]}>BOŞANMIŞ</option>
						</select>
					</div>
				</div>
			</div>   			
		</div>
	</div>


	<div class="card mt-2" id="ikamet_bilgileri" >
		<div class="card-header">
			<h4 class="card-title">İkamet Bilgileri</h4>      			
		</div>
		<div class="card-body">

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">*İL</label>
						<select name="il" id="il" class="form-control" required>
							<option>SEÇİNİZ...</option>	
							@foreach(il() as $key)
							<option value="{{$key->id}}" {[ selected($key->adi,uye_edit($id)->i_il) ]}>{{$key->adi}}</option>	
							@endforeach				
						</select>
					</div>
					<div class="col-6">
						<label class="form-label">*İLÇE</label>
						<select name="ilce" id="ilce" class="form-control" required >
							<option>ÖNCE İLİ SEÇİN...</option>
							@foreach(ilce() as $key)
							<option value="{{$key->id}}" {[ selected($key->ilce_adi,uye_edit($id)->i_ilce) ]}>{{$key->ilce_adi}}</option>	
							@endforeach		
						</select>
					</div>
				</div>
			</div>
			<div class="mt-3">
				<label class="form-label">SEMT / KÖY</label>
				<input type="text" name="i_semt" value="{[ echo uye_edit($id)->i_semt ]}" class="form-control buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
			</div>

			<div class="mt-3">
				<label class="form-label">*MAHALLE : </label>
				<input type="text" name="i_mh" value="{[ echo uye_edit($id)->i_mh ]}" class="form-control buyuk"  required placeholder="SADECE MAHALLE ADINI YAZIN ">
			</div>

			<div class="mt-3">
				<label class="form-label">CADDE: </label>
				<input type="text" name="i_cd" id="" value="{{uye_edit($id)->i_cd}}"  class="form-control buyuk"  placeholder="VARSA SADECE CADDE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<label class="form-label">*SOKAK: </label>
				<input type="text" name="i_sk" id="" value="{{uye_edit($id)->i_sk}}" required  class="form-control buyuk" placeholder="SADECE SOKAK ADINI YAZIN">
			</div>

			<div class="mt-3">
				<label class="form-label">SİTE ADI: </label>
				<input type="text" name="i_site" value="{{uye_edit($id)->i_site}}"   class="form-control buyuk" placeholder="VARSA OTURDUĞU SİTE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">BİNA NO</label>
						<input type="text" name="i_kapino"  id="i_kapino" value="{{uye_edit($id)->i_kapino}}" class="form-control" required >  					
					</div>
					<div class="col-6">
						<label class="form-label">KAPI NO</label>
						<input type="text" name="i_daireno" id="i_daireno" value="{{uye_edit($id)->i_daireno}}" class="form-control" >
					</div>
				</div>
			</div>
			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">Sabit Telefon</label>
						<input type="text" name="tel" class="form-control" value="{{uye_edit($id)->ev_tel}}" data-mask="0(000) 000-00-00" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off">
					</div>
					<div class="col-6">
						<label class="form-label">Cep Telefon</label>
						<input type="text" name="cep" class="form-control" value="{{uye_edit($id)->gsm}}" data-mask="0(500) 000-00-00" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off">
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="card mt-2" id="meslek_bilgileri" >
		<div class="card-header">
			<h4 class="card-title">Mesleki Bilgileri</h4>      			
		</div>
		<div class="card-body">

			<div class="mt-3" >
				<label class="form-label">ÇALIŞIYORMU: </label>

				<select name="calisiyormu" id="calisiyormu" class="form-select">
					<option value="EVET" {{selected('EVET',uye_edit($id)->calisiyormu)}}>EVET</option>
					<option value="HAYIR" {{selected('HAYIR',uye_edit($id)->calisiyormu)}}>HAYIR</option>
					<option value="EMEKLİ" {{selected('EMEKLİ',uye_edit($id)->calisiyormu)}}>EMEKLİ</option>
				</select>

			</div>

			<div id="meslek">
				<div class="mt-3" >
					<label class="form-label">MESLEĞİ: </label>				
					<input type="text" name="meslegi" value="{{uye_edit($id)->meslegi}}" id="meslek"  class="form-control meslek"  >
				</div>
			</div>
		</div>

	</div>

	<div class="card mt-2" id="saglik_bilgileri" >
		<div class="card-header">
			<h4 class="card-title">Sağlık Bilgileri</h4>      			
		</div>
		<div class="card-body">
			<div class="mt-3">
				<label class="form-label">SOSYAL GÜVENCESİ</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="s_guvence" {{checked('BİLİNMİYOR',uye_edit($id)->s_guvence)}} value="BİLİNMİYOR">
					<span class="form-check-label">BİLİNMİYOR</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="s_guvence" {{checked('SGK',uye_edit($id)->s_guvence)}} value="SGK">
					<span class="form-check-label">SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="s_guvence" {{checked('GSS',uye_edit($id)->s_guvence)}} value="GSS">
					<span class="form-check-label">GSS (YEŞİLKART, 2022)</span>
				</label>      			
			</div>
			<div class="mt-3">
				<label class="form-label">ENGELİN OLUŞ SEBEBİ</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="eos[]" {{checked('KAZA',uye_edit($id)->eos)}} value="KAZA">
					<span class="form-check-label">KAZA</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="eos[]" {{checked('HASTALIK',uye_edit($id)->eos)}} value="HASTALIK">
					<span class="form-check-label">HASTALIK</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="eos[]" {{checked('DOĞUŞTAN',uye_edit($id)->eos)}} value="DOĞUŞTAN">
					<span class="form-check-label">DOĞUŞTAN</span>
				</label>
			</div>
			<div class="mt-3">
				<label class="form-label">ENGEL GRUBU</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('BEDENSEL',uye_edit($id)->engl_grubu)}} value="BEDENSEL">
					<span class="form-check-label">BEDENSEL</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('GÖRME',uye_edit($id)->engl_grubu)}} value="GÖRME">
					<span class="form-check-label">GÖRME</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('ZİHİNSEL',uye_edit($id)->engl_grubu)}} value="ZİHİNSEL">
					<span class="form-check-label">ZİHİNSEL</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('İŞİTME',uye_edit($id)->engl_grubu)}} value="İŞİTME">
					<span class="form-check-label">İŞİTME</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('SÜREĞEN HASTALIK',uye_edit($id)->engl_grubu)}} value="SÜREĞEN HASTALIK">
					<span class="form-check-label">SÜREĞEN HASTALIK</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="engl_grubu[]" {{checked('HASTALIK',uye_edit($id)->engl_grubu)}} value="HASTALIK">
					<span class="form-check-label">HASTALIK</span>
				</label>                    
			</div>
			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">ENGEL ORANI</label>
						<div class="input-group">
							<select name="engl_svy" id="englsvy" class="form-select" >
								<option value="0">SEÇİNİZ...</option>
								@for ($i=40; $i <101 ; $i++)
								<option value="{{$i}}" {{selected($i, uye_edit($id)->engl_svy)}} >{{$i}}</option>
								@endfor
							</select>                              
							<span class="input-group-text">%</span>
						</div>
					</div>
					<div class="col-6">
						<label class="form-label">ENGELLİ İLE YAKINLIĞI</label>
						<input type="text" name="engl_yakinligi" value="{{uye_edit($id)->engl_yakinligi}}" class="form-control">
					</div>
				</div>      				
			</div>
			<div class="mt-3">
				<label class="form-label">ENGEL SEBEBİ</label>
				<textarea class="form-control" name="engl_sebebi" rows="6">{{uye_edit($id)->engl_sebebi}}</textarea>
			</div>
			<div class="mt-3">
				<label class="form-label">ENGEL AÇIKLAMASI</label>
				<textarea class="form-control" name="engl_aciklamasi" rows="6">{{uye_edit($id)->engl_aciklamasi}}</textarea>
			</div>      			
		</div>
	</div>

	<div class="card mt-2" id="diger_bilgiler" >
		<div class="card-header">
			<h4 class="card-title">Diğer Bilgiler</h4>      			
		</div>
		<div class="card-body">
		</div>
	</div>

</form>

<!-- / ÜYELİK TÜRÜ BİLGİLERİ -->	



	
	<!--  EĞİTİM BİLGİLERİ -->
	<div class="widget-box" id="egitim_bilgileri" >
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
	<div class="widget-box" id="diger_bilgiler" >
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
	<div class="widget-box" id="gorev"  >
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
	<div class="widget-box" id="evrak" >
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
	<div class="widget-box" id="talebi" >
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