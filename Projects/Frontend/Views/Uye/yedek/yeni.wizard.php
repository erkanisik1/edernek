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
      				<select name="uyetur" id="uyetur" class="form-select" required autofocus>
      					<option value="" select>Seçiniz...</option> 
      					<option value="ENGELLİ ÜYE">ENGELLİ ÜYE</option>
      					<option value="SAĞLAM ÜYE">SAĞLAM ÜYE</option>
      					<option value="ENGELLİ VASİSİ">ENGELLİ VASİSİ</option>
      					<option value="ÜYE DEĞİL">ÜYE DEĞİL</option>
      				</select>	
      			</div>

      			<div class="mb-3" style="display:none;" id="bt">
      				<div class="row">
      					<div class="col-4 mb-3">
      						<label class="form-label">BAŞVURU TARİHİ </label>
      						<input type="text" name="mtarih" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
      					</div>

      					<div class="col-4 mb-3">
      						<label class="form-label">ÜYELİK KABUL TARİHİ</label>
      						<input type="text" name="ubt" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
      					</div>

      					<div class="col-4 mb-3">
      						<label class="form-label">ÜYELİK DURUMU</label>
      						<select name="uyedurumu" id="uyedurumu" class="form-select uyedurumu1" required autofocus>
      							<option value="ONAY BEKLİYOR" selected >ONAY BEKLİYOR</option>
      							<option value="AKTİF" >AKTİF</option>
      							<option value="VEFAT" >VEFAT</option>
      							<option value="AYRILDI" >AYRILDI</option>
      							<option value="ÇIKARILDI" >ÇIKARILDI</option>	
      							<option value="ÜYE DEĞİL" >ÜYE DEĞİL</option>
      						</select>	
      					</div>

      					<div id="onay" style="display: none;">
      						<div class="row">
      							<div class="col-6">
      								<label class="form-label">ÜYELİK NO </label>
      								<input type="text" name="uyeno" value="0" class="form-control" >
      							</div>
      							<div class="col-6">
      								<label class="form-label">KARAR NO</label>
      								<input type="text" name="ukararno" value="0" class="form-control" > 
      							</div>
      						</div>
      					</div>	
      				</div>
      			</div>

      		</div>
      	</div>

      	<div class="card mt-2" id="kimlik_bilgileri" style="display:none;">
      		<div class="card-header">
                <h4 class="card-title">Kimlik Bilgileri</h4>      			
      		</div>
      		<div class="card-body">
      			<div class="mt-3">
					<label class="form-label">*TC NO </label>
					<input type="text"  name="tcno" id="tcno" value="" maxlength="11"  class="form-control" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >
				</div>

				<div class="mt-3">
					<div class="row">
						<div class="col-6">
							<label class="form-label">*ADI </label>
							<input type="text" name="adi" value="" id=""  class="form-control buyuk char" required> 
						</div>
						<div class="col-6">
							<label class="form-label">*SOYADI </label>
							<input type="text" name="soyadi" id="" value=""  class="form-control buyuk" required>
						</div>
					</div>					
				</div>

				<div class="mt-3">
					<div class="row">
						<div class="col-6">
							<label class="form-label">*BABA ADI </label>
							<input type="text" name="babaadi" value="" id=""  class="form-control buyuk char" required> 
						</div>
						<div class="col-6">
							<label class="form-label">*ANNE ADI </label>
							<input type="text" name="anneadi" id="" value=""  class="form-control buyuk" required>
						</div>
					</div>					
				</div>

				<div class="mt-3">
					<div class="row">
						<div class="col-4">
							<label class="control-label">DOĞUM TARİHİ</label>
							<input type="text" name="Dtarih" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
						</div>
						<div class="col-4">
							<label class="control-label">DOĞUM YERİ</label>
							<input type="text" name="dyeri" value="" class="form-control buyuk" required>
						</div>
						<div class="col-4">
							<label class="control-label">KÜTÜK İL / İLÇE</label>
							<input type="text" name="kutuk" value="" class="form-control buyuk" required>
						</div>
					</div>
				</div>   
				<div class="mt-3">
					<div class="row">
						<div class="col-4">
							<label class="control-label">Cinsiyeti</label>
							<select name="cinsiyeti" class="form-select" required>
								<option value="">SEÇİNİZ....</option>
								<option value="KADIN">KADIN</option>
								<option value="ERKEK">ERKEK</option>
							</select>
						</div>
						<div class="col-4">
							<label class="control-label">Kan Grubu</label>
							<select name="kangrub" class="form-select" >
								<option value="BİLİNMİYOR">BİLİNMİYOR</option>
								<option value="A - RH" >A - RH</option>
								<option value="A + RH" >A + RH</option>
								<option value="B - RH" >B - RH</option>
								<option value="B + RH" >B + RH</option>
								<option value="AB - RH">AB - RH</option>
								<option value="AB + RH">AB + RH</option>
								<option value="0 - RH" >0 - RH</option>
								<option value="0 + RH" >0 + RH </option>
							</select>
						</div>
						<div class="col-4">
							<label class="control-label">Medeni Durumu</label>
							<select name="medenidurum" class="form-control" required>
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
      	</div>


      	<div class="card mt-2" id="ikamet_bilgileri" style="display:none;">
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
								<option value="{{$key->id}}">{{$key->adi}}</option>	
								@endforeach				
							</select>
      					</div>
      					<div class="col-6">
      						<label class="form-label">*İLÇE</label>
      						<select name="ilce" id="ilce" class="form-control" required >
								<option>ÖNCE İLİ SEÇİN...</option>
							</select>
      					</div>
      				</div>
      			</div>
      			<div class="mt-3">
      				<label class="form-label">SEMT / KÖY</label>
      				<input type="text" name="i_semt" value="" class="form-control buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
      			</div>

      			<div class="mt-3">
					<label class="form-label">*MAHALLE : </label>
					<input type="text" name="i_mh" value="" class="form-control buyuk"  required placeholder="SADECE MAHALLE ADINI YAZIN ">
				</div>

				<div class="mt-3">
					<label class="form-label">CADDE: </label>
					<input type="text" name="i_cd" id="" value=""  class="form-control buyuk"  placeholder="VARSA SADECE CADDE ADINI YAZIN">
				</div>

				<div class="mt-3">
					<label class="form-label">*SOKAK: </label>
					<input type="text" name="i_sk" id="" value="" required  class="form-control buyuk" placeholder="SADECE SOKAK ADINI YAZIN">
				</div>
				
				<div class="mt-3">
					<label class="form-label">SİTE ADI: </label>
					<input type="text" name="i_site" value=""   class="form-control buyuk" placeholder="VARSA OTURDUĞU SİTE ADINI YAZIN">
				</div>

				<div class="mt-3">
					<div class="row">
						<div class="col-6">
							<label class="form-label">BİNA NO</label>
							<input type="text" name="i_kapino"  id="i_kapino" value="1" class="form-control" required >  					
						</div>
						<div class="col-6">
							<label class="form-label">KAPI NO</label>
							<input type="text" name="i_daireno" id="i_daireno" value="1" class="form-control" >
						</div>
					</div>
				</div>
				<div class="mt-3">
					<div class="row">
						<div class="col-6">
							<label class="form-label">Sabit Telefon</label>
							<input type="text" name="tel" class="form-control" data-mask="(000) 000-00-00" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off">
						</div>
						<div class="col-6">
							<label class="form-label">Cep Telefon</label>
							<input type="text" name="cep" class="form-control" data-mask="(500) 000-00-00" data-mask-visible="true" placeholder="(00) 0000-0000" autocomplete="off">
						</div>
					</div>
				</div>

      		</div>
      	</div>

      	<div class="card mt-2" id="meslek_bilgileri" style="display:none;">
      		<div class="card-header">
                <h4 class="card-title">Mesleki Bilgileri</h4>      			
      		</div>
      		<div class="card-body">

      			<div class="mt-3" >
				<label class="form-label">ÇALIŞIYORMU: </label>
			
					<select name="calisiyormu" id="calisiyormu" class="form-select">
						<option value="EVET">EVET</option>
						<option value="HAYIR" selected>HAYIR</option>
						<option value="EMEKLİ">EMEKLİ</option>
					</select>
				
			</div>

			<div id="meslek">
				<div class="mt-3" >
					<label class="form-label">MESLEĞİ: </label>				
						<input type="text" name="meslegi" value="" id="meslek"  class="form-control meslek"  >
					</div>
				</div>
			</div>
      		
      	</div>

      	<div class="card mt-2" id="saglik_bilgileri" style="display:none;">
      		<div class="card-header">
                <h4 class="card-title">Sağlık Bilgileri</h4>      			
      		</div>
      		<div class="card-body">
      			<div class="mt-3">
      				<label class="form-label">SOSYAL GÜVENCESİ</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence" checked value="BİLİNMİYOR">
                        <span class="form-check-label">BİLİNMİYOR</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence"  value="SGK">
                        <span class="form-check-label">SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="s_guvence"  value="GSS">
                        <span class="form-check-label">GSS (YEŞİLKART, 2022)</span>
                    </label>      			
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGELİN OLUŞ SEBEBİ</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="KAZA">
                        <span class="form-check-label">KAZA</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="HASTALIK">
                        <span class="form-check-label">HASTALIK</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="eos[]" value="DOĞUŞTAN">
                        <span class="form-check-label">DOĞUŞTAN</span>
                    </label>
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL GRUBU</label>
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="BEDENSEL">
                        <span class="form-check-label">BEDENSEL</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="GÖRME">
                        <span class="form-check-label">GÖRME</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="ZİHİNSEL">
                        <span class="form-check-label">ZİHİNSEL</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="İŞİTME">
                        <span class="form-check-label">İŞİTME</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="SÜREĞEN HASTALIK">
                        <span class="form-check-label">SÜREĞEN HASTALIK</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="engl_grubu[]" value="HASTALIK">
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
									<option value="{{$i}}" >{{$i}}</option>
									@endfor
								</select>                              
	                            <span class="input-group-text">%</span>
                            </div>
      					</div>
      					<div class="col-6">
      						<label class="form-label">ENGELLİ İLE YAKINLIĞI</label>
      						<input type="text" name="engl_yakinligi" value="KENDİSİ" class="form-control">
      					</div>
      				</div>      				
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL SEBEBİ</label>
      				<textarea class="form-control" name="engl_sebebi" rows="6"></textarea>
      			</div>
      			<div class="mt-3">
      				<label class="form-label">ENGEL AÇIKLAMASI</label>
      				<textarea class="form-control" name="engl_aciklamasi" rows="6"></textarea>
      			</div>      			
      		</div>
      	</div>

      	<div class="card mt-2" id="egitim_bilgileri" style="display:none;">
      		<div class="card-header">
                <h4 class="card-title"><i class="fa fa-th"></i> Eğitim Bilgiler</h4>      			
      		</div>
      		<div class="card-body">
      			<div class="row">
      				<div class="col-6">
      					<label class="form-label">Öğrenim durumu</label>
      					<select name="ogrenimdurumu" class="form-select" >
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="OKUMA YAZMA  BİLMİYOR">OKUMA YAZMA BİLMİYOR</option>
						<option value="OKUR YAZAR" >OKUR YAZAR</option>
						<option value="ÖZEL EĞİTİM" >ÖZEL EĞİTİM</option>
						<option value="İLKOKUL" >İLKOKUL</option>
						<option value="ORTAOKUL" >ORTAOKUL</option>
						<option value="İLKÖĞRETİM" >İLKÖĞRETİM</option>
						<option value="LİSE" >LİSE</option>
						<option value="ÜNİVERSİTE" >ÜNİVERSİTE</option>
					</select>
      				</div>
      				<div class="col-6">
      					<label class="form-label">Okuyormu</label>
      					<select name="okuyormu" class="form-select">
						<option value="BİLİNMİYOR" >BİLİNMİYOR</option>
						<option value="EVET" >EVET</option>
						<option value="HAYIR" selected>HAYIR</option>
						<option value="TERK" >TERK</option>
					</select>
      				</div>
      			</div>
      		</div>
      	</div>

      	<div class="card mt-2" id="diger_bilgiler" style="display:none;">
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> Diğer bilgileri
      			</div>
      		</div>
      		<div class="card-body">
      			<div class="mt-3">      				
      				<label class="form-label">İLGİ ALANLARI: </label>
					<textarea name="ilgialani"  class="form-control" rows="5"></textarea>
      			</div>

      			<div class="mt-3">
      				<label class="form-label">Not</label>
 					<textarea name="not" class="form-control" rows="5"></textarea>

      			</div>

      		</div>
      		
      	</div>

      	<div class="card mt-2" id="gorev" style="display:none;">
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> AKTİF OLARAK FAALİYETLERİMİZE KATILMAK İSTERMİSİNİZ?
      			</div>
      		</div>
      		<div class="card-body">
      			<div class="mt-3">
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gorev[]" checked value="HAYIR">
                        <span class="form-check-label">HAYIR</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gorev[]" value="HAFTA İÇİ">
                        <span class="form-check-label">HAFTA İÇİ</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gorev[]" value="HAFTA SONU">
                        <span class="form-check-label">HAFTA SONU</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gorev[]" value="HERHANGİ BİR GÜN">
                        <span class="form-check-label">HERHANGİ BİR GÜN</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="gorev[]" value="GÖNÜLLÜ">
                        <span class="form-check-label">GÖNÜLLÜ (BELLİ ZAMANLARDA GÖREV ALABİLİRİM)</span>
                    </label>      			
      			</div>
      		</div>
      	</div>


      	<div class="card mt-2" id="evrak" style="display:none;">
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> GEREKLİ EVREKLAR ( Getirdiği belgeleri seçin.)
      			</div>
      		</div>
      		<div class="card-body">
      			<div class="mt-3">
      				<label class="form-label">Resim (Adedini seçin)</label>
      				<select name="resim" class="form-select">
						<option value="0" selected >Resim yok</option>
						<option value="1" >1 Resim</option>
						<option value="2" >2 Resim</option>
						<option value="3" >3 Resim</option>
						<option value="4" >4 Resim</option>
					</select> 
      			</div>
      			<div class="mt-3">
      				<label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="evrak[]" value="İKAMETGAH">
                        <span class="form-check-label">İKAMETGAH</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="evrak[]" value="NÜFUS CÜZDANI FOTOKOPİSİ">
                        <span class="form-check-label">NÜFUS CÜZDANI FOTOKOPİSİ</span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="evrak[]" value="ENGELLİ RAPORU">
                        <span class="form-check-label">ENGELLİ RAPORU</span>
                    </label>
                   			
      			</div>
      		</div>
      	</div>

      	<div class="card mt-2" id="talebi" style="display:none;">
      		<div class="card-header">
      			<div class="card-title">
      				<i class="fa fa-signal"></i> TALEBİ
      			</div>
      		</div>
      		<div class="card-body">
      			 <div class="mt-3">
      			 	<select name="talep" id="" multiple multiselect-search="true" multiselect-select-all="true">
      			 		<option value="0">Talebi yok.</option>
      			 		@foreach(talep() as $key)
      			 		<option value="{{$key->id}}">{{$key->adi}}</option>
      			 		@endforeach
      			 	</select>
      		
      			 	
      			 </div>
      			
      		</div>
      	</div>

	
     </form>
