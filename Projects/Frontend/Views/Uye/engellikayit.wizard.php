<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-white">
                  ÜYE KAYIT FORMU.
                </h2>
              </div>
            </div>
          </div>
        </div>

<form action="#" method="post">

	<div class="card mt-2">
		<div class="card-status-top bg-danger"></div>
		<div class="card-body">			
			<div class="mb-3 ">
				<div class="row ">
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK TÜRÜ: </label>
						<select name="uyetur" id="uyetur" class="form-select">
							<option value="">Seçiniz...</option> 
							@foreach(uyeTur() as $key)
							<option value="{{$key->id}}">{{$key->name}}</option>
							@endforeach
						</select>					
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">BAŞVURU TARİHİ </label>
						<input type="date" name="mtarih" class="form-control" value=""  placeholder="00/00/0000" autocomplete="off">	
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK KABUL TARİHİ</label>
						<input type="date" name="ubt" class="form-control" value="" placeholder="00/00/0000" autocomplete="off">	
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK DURUMU</label>
						<select name="uyedurumu" id="uyedurumu" class="form-select uyedurumu1" required autofocus>
							@foreach(uyedurumu() as $key)
							<option value="{{$key->id}}" {{selected('1', $key->id)}}>{{$key->durum}}</option>
							@endforeach
						</select>	
					</div>					
					<div class="col-2">
						<label class="form-label">ÜYELİK NO </label>
						<input type="text" name="uyeno"  class="form-control" value="" >
					</div>
					<div class="col-2">
						<label class="form-label">KARAR NO</label>
						<input type="text" name="ukararno"  class="form-control" value="" > 
					</div>
				</div>
			</div>	
		</div>
	</div>

	<div class="card mt-2" id="kimlik_bilgileri" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title">Kimlik Bilgileri</h4></div>
		<div class="card-body">
			<div class="mt-3">
				<div class="row">
					<div class="col-4">
						<label class="form-label">*TC NO </label>
						<input type="text"  name="tcno" value="" class="form-control"  inputmode="numeric" data-mask="00000000000" data-mask-visible="true" placeholder="00000000000"  title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >
					</div>
					<div class="col-4">
						<label class="form-label">*ADI </label>
						<input type="text" name="adi" value="" id=""  class="form-control buyuk char" required> 
					</div>
					<div class="col-4">
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
						<label class="control-label">DOĞUM TARİHİ: </label>
						<input type="text" name="Dtarih" value=" )" class="form-control" data-mask="00/00/0000" data-mask-visible="true" placeholder="00/00/0000" autocomplete="off">	
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
							<option value="A - RH">A - RH</option>
							<option value="A + RH">A + RH</option>
							<option value="B - RH">B - RH</option>
							<option value="B + RH">B + RH</option>
							<option value="AB - RH">AB - RH</option>
							<option value="AB + RH">AB + RH</option>
							<option value="0 - RH">0 - RH</option>
							<option value="0 + RH">0 + RH </option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label">Medeni Durumu</label>
						<select name="medenidurum" class="form-control" required>
							<option value="">SEÇİNİZ...</option>
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


	<div class="card mt-2" id="ikamet_bilgileri">
		<div class="card-header bg-dark bg-gradient text-white " ><h4 class="card-title">İkamet Bilgileri</h4></div>
		<div class="card-body">
			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label  ">*İL</label>
						<select name="il" id="il" class="form-control" required>
							<option>SEÇİNİZ...</option>	
							@foreach(il() as $key)
							<option value="{{$key->id}}">{{$key->adi}}</option>	
							@endforeach				
						</select>
					</div>
					<div class="col-6">
						<label class="form-label  ">*İLÇE</label>
						<select name="ilce" id="ilce" class="form-control" required >
							<option>ÖNCE İLİ SEÇİN...</option>
						</select>
					</div>
				</div>
			</div>
			<div class="mt-3">
				<label class="form-label  ">SEMT / KÖY</label>
				<input type="text" name="i_semt" value="" class="form-control buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
			</div>

			<div class="mt-3">
				<label class="form-label  ">*MAHALLE : </label>
				<input type="text" name="i_mh" value="" class="form-control buyuk"  required placeholder="SADECE MAHALLE ADINI YAZIN ">
			</div>

			<div class="mt-3">
				<label class="form-label  ">CADDE: </label>
				<input type="text" name="i_cd" id="" value=""  class="form-control buyuk"  placeholder="VARSA SADECE CADDE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<label class="form-label  ">*SOKAK: </label>
				<input type="text" name="i_sk" id="" value="" required  class="form-control buyuk" placeholder="SADECE SOKAK ADINI YAZIN">
			</div>
			
			<div class="mt-3">
				<label class="form-label  ">SİTE ADI: </label>
				<input type="text" name="i_site" value=""   class="form-control buyuk" placeholder="VARSA OTURDUĞU SİTE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label  ">BİNA NO</label>
						<input type="text" name="i_kapino"  id="i_kapino" value="" class="form-control" required >  					
					</div>
					<div class="col-6">
						<label class="form-label  ">KAPI NO</label>
						<input type="text" name="i_daireno" id="i_daireno" value="" class="form-control" >
					</div>
				</div>
			</div>
			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label  ">Sabit Telefon</label>
						<input type="text" name="ev_tel" class="form-control"  value="" data-mask="0(000) 000-00-00" data-mask-visible="true" placeholder="0(000) 000-00-000" autocomplete="off">
					</div>
					<div class="col-6">
						<label class="form-label  ">Cep Telefon</label>
						<input type="text" name="gsm" class="form-control"  value="" data-mask="0(500) 000-00-00" data-mask-visible="true" placeholder="0(500) 000-00-000" autocomplete="off">
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="card mt-2" id="meslek_bilgileri" >
		<div class="card-header bg-dark bg-gradient text-white" ><h4 class="card-title">Mesleki Bilgileri</h4></div>
		<div class="card-body">
			<div class="row">
				<div class="col-6">
					<div class="mt-3" >
						<label class="form-label ">ÇALIŞIYORMU: </label>				
						<select name="calisiyormu" id="calisiyormu" class="form-select">
							<option value="EVET">EVET</option>
							<option value="HAYIR">HAYIR</option>
							<option value="EMEKLİ">EMEKLİ</option>
						</select>				
					</div>					
				</div>
				<div class="col-6">
					<div id="meslek">
						<div class="mt-3" >
							<label class="form-label ">MESLEĞİ: </label>				
							<input type="text" name="meslegi"  value="" id="meslek"  class="form-control meslek"  >
						</div>
					</div>					
				</div>
			</div>			
		</div>		
	</div>

	<div class="card mt-2" id="saglik_bilgileri" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title">Sağlık Bilgileri</h4></div>
		<div class="card-body">
			<div class="row ">
				<div class="col-7">
					<div class="mt-3">
						<label class="form-label ">SOSYAL GÜVENCESİ</label>
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="s_guvence" value="BİLİNMİYOR">
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
				</div>
				<div class="col-5">
					<div class="mt-3">
						<label class="form-label ">ENGELİN OLUŞ SEBEBİ</label>
						@foreach(eosList() as $key)
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="eos[]" value="{{$key->id}}">
							<span class="form-check-label">{{$key->name}}</span>
						</label>
						@endforeach
						
					</div>					
				</div>
			</div>			
			<div class="mt-3 ">
				<label class="form-label ">ENGEL GRUBU</label>
				@foreach(engelGrubu() as $key)
				<label class="form-check form-check-inline">
					<input type="checkbox" class="form-check-input"  name="engl_grubu[]" value="{{$key->id}}">
					<span class="form-check-label">{{$key->engelGrubu}}</span>
				</label>
				@endforeach		
			</div>
			<div class="mt-3 ">
				<div class="row  pb-1 ">
					<div class="col-6">
						<label class="form-label ">ENGEL ORANI</label>
						<div class="input-group">
							<select name="engl_svy" id="englsvy" class="form-select" >
								<option value="0">SEÇİNİZ...</option>
								@for ($i=40; $i <101 ; $i++)
								<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>                              
							<span class="input-group-text">%</span>
						</div>
					</div>
					<div class="col-6">
						<label class="form-label ">ENGELLİ İLE YAKINLIĞI</label>
						<input type="text" name="engl_yakinligi" value="" class="form-control">
					</div>
				</div>      				
			</div>
			<div class="mt-3 ">
				<label class="form-label ">ENGEL SEBEBİ</label>
				<textarea class="form-control" name="engl_sebebi" rows="6"></textarea>
			</div>
			<div class="mt-3 ">
				<label class="form-label ">ENGEL AÇIKLAMASI</label>
				<textarea class="form-control" name="engl_aciklamasi" rows="6"></textarea>
			</div>      			
		</div>
	</div>

	<div class="card mt-2" id="diger_bilgiler" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title">Diğer Bilgiler</h4></div>
		<div class="card-body">
			<div class="mt-3">
				<label class="control-label">İLGİL ALANLARI: </label>
				<textarea name="ilgialani"  class="form-control" rows="5"></textarea>
			</div>

			<div class="mt-3">
				<label class="control-label">NOT: </label>
				<textarea name="not" class="form-control" rows="5"></textarea>				
			</div>

			<div class="mt-3">
				<label class="form-label">OKUYORMU</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="EVET">
					<span class="form-check-label">EVET</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="HAYIR">
					<span class="form-check-label">HAYIR</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="TERK">
					<span class="form-check-label">TERK</span>
				</label>
			</div>

			<div class="mt-3">
				<label class="form-label">ÖĞRENIM DURUMU</label>
				<select name="ogrenimdurumu" class="form-select">
					<option value="">SEÇİNİZ...</option>
					@foreach(ogrenimdurumu() as $key)
					<option value="{{$key->id}}">{{$key->name}}</option>
					@endforeach
				</select> 
			</div>

			<div class="mt-3">
				<label class="form-label">ALDIĞI YARDIMLAR</label>

				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="aldigiYardim" value="2022">
					<span class="form-check-label">2022</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="aldigiYardim" value="Evde Bakım">
					<span class="form-check-label">Evde Bakım</span>
				</label>
			</div>



		</div>
	</div>

	<div class="card mt-2" id="evrak_bilgiler" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title">Evrak Bilgiler</h4></div>
		<div class="card-body">
			<div class="row">
				<div class="col-1">
					<label class="form-label">Resim</label>
					<input type="text" name="resim" class="form-control">
				</div>
				<div class="col-6">
					
					<label class="form-label">Getirilen Evraklar</label>
						@foreach(evrak() as $key)
					<label class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="evrak[]"	value="{{$key->id}}">
						<span class="form-check-label">{{$key->name}}</span>
					</label>
					@endforeach
				
						

				</div>
				<div class="col-5">
					<label  class="form-label">Talepler</label>
					
					<select name="talep[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true">

					@foreach(talep() as $key)
						<option value="{{$key->id}}">{{$key->adi}}</option>
					@endforeach
					</select>

				</div>
			</div>		

		</div>
	</div>
	<div class="mt-3">
		
	<button type="submit" class="btn btn-primary" style="width:100%">Kaydet</button>
	</div>
</form>
