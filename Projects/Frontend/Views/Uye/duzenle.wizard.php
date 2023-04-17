<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title text-white">
                  ÜYE DÜZENLEME FORMU.
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
				<div class="row">			
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK TÜRÜ: </label>
						<select name="uyetur" id="uyetur" class="form-select">
							<option value="">Seçiniz...</option> 
							@foreach(uyeTur() as $key)
							<option value="{{$key->id}}" {{selected($key->id, uye_edit($id)->uyetur)}}>{{$key->name}}</option>
							@endforeach
						</select>					
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">BAŞVURU TARİHİ </label>
						<input type="text" name="mtarih" class="form-control" value="{{tcevir(uye_edit($id)->mtarih)}}" data-mask="00-00-0000" data-mask-visible="true" placeholder="00-00-0000" autocomplete="off">	
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK KABUL TARİHİ</label>
						<input type="text" name="ubt" class="form-control" value="{{tcevir(uye_edit($id)->ubt)}}" data-mask="00-00-0000" data-mask-visible="true" placeholder="00-00-0000" autocomplete="off">	
					</div>
					<div class="col-2 mb-3">
						<label class="form-label">ÜYELİK DURUMU</label>
						<select name="uyedurumu" id="uyedurumu" class="form-select uyedurumu1"  autofocus>
							@foreach(uyedurumu() as $key)
							<option value="{{$key->id}}" {[ selected($key->id, uye_edit($id)->uyedurumu) ]}>{{$key->durum}}</option>
							@endforeach
						</select>	
					</div>					
					<div class="col-2">
						<label class="form-label">ÜYELİK NO </label>
						<input type="text" name="uyeno"  class="form-control" value="{{uye_edit($id)->uyeno}}" >
					</div>
					<div class="col-2">
						<label class="form-label">KARAR NO</label>
						<input type="text" name="ukararno"  class="form-control" value="{{uye_edit($id)->ukararno}}" > 
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
				<input type="text"  name="tcno" value="{[ echo uye_edit($id)->tcno ]}" class="form-control"data-mask="00000000000" data-mask-visible="true" placeholder="00000000000" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ"  >
					</div>
					<div class="col-4">
						<label class="form-label">*ADI </label>
						<input type="text" name="adi" value="{{uye_edit($id)->adi}}" class="form-control buyuk char" > 
					</div>
					<div class="col-4">
						<label class="form-label">*SOYADI </label>
						<input type="text" name="soyadi" value="{{uye_edit($id)->soyadi}}"  class="form-control buyuk" >
					</div>
				</div>					
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label">*BABA ADI </label>
						<input type="text" name="babaadi" value="{{uye_edit($id)->babaadi}}" class="form-control buyuk char" > 
					</div>
					<div class="col-6">
						<label class="form-label">*ANNE ADI </label>
						<input type="text" name="anneadi" value="{{uye_edit($id)->anneadi}}"  class="form-control buyuk" >
					</div>
				</div>					
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-4">
						<label class="control-label">DOĞUM TARİHİ: {{yas(uye_edit($id)->dtarih)}} Yaşında</label>
						<input type="text" name="dtarih" value="{{tcevir(uye_edit($id)->dtarih)}} ( {{yas(uye_edit($id)->dtarih)}} )" class="form-control" data-mask="00-00-0000" data-mask-visible="true" placeholder="00-00-0000" autocomplete="off">	
					</div>
					<div class="col-4">
						<label class="control-label">DOĞUM YERİ</label>
						<input type="text" name="dyeri" value="{{uye_edit($id)->dyeri}}" class="form-control buyuk" >
					</div>
					<div class="col-4">
						<label class="control-label">KÜTÜK İL / İLÇE</label>
						<input type="text" name="kutuk" value="{{uye_edit($id)->kutuk}}" class="form-control buyuk" >
					</div>
				</div>
			</div>   
			<div class="mt-3">
				<div class="row">
					<div class="col-4">
						<label class="control-label">Cinsiyeti</label>
						<select name="cinsiyeti" class="form-select" >
							<option value="">SEÇİNİZ....</option>
							<option value="KADIN" {{selected('KADIN', uye_edit($id)->cinsiyeti)}} >KADIN</option>
							<option value="ERKEK" {{selected('ERKEK', uye_edit($id)->cinsiyeti)}} >ERKEK</option>
						</select>
						
					</div>
					<div class="col-4">
						<label class="control-label">Kan Grubu</label>
						<select name="kangrub" class="form-select" >
							<option value="BİLİNMİYOR" {{ selected('BİLİNMİYOR', uye_edit($id)->kangrub) }}>BİLİNMİYOR</option>
							<option value="A - RH" {{ selected('A - RH', uye_edit($id)->kangrub) }}>A - RH</option>
							<option value="A + RH" {{ selected('A + RH', uye_edit($id)->kangrub) }}>A + RH</option>
							<option value="B - RH" {{ selected('B - RH', uye_edit($id)->kangrub) }}>B - RH</option>
							<option value="B + RH" {{ selected('B + RH', uye_edit($id)->kangrub) }}>B + RH</option>
							<option value="AB - RH"{{ selected('AB - RH', uye_edit($id)->kangrub) }}>AB - RH</option>
							<option value="AB + RH"{{ selected('AB + RH', uye_edit($id)->kangrub) }}>AB + RH</option>
							<option value="0 - RH" {{ selected('0 - RH', uye_edit($id)->kangrub) }}>0 - RH</option>
							<option value="0 + RH" {{ selected('0 + RH', uye_edit($id)->kangrub) }}>0 + RH </option>
						</select>
					</div>
					<div class="col-4">
						<label class="control-label">Medeni Durumu</label>
						<select name="medenidurum" class="form-control" >
							<option value="">SEÇİNİZ...</option>
							<option value="BİLİNMİYOR"{{ selected('BİLİNMİYOR', uye_edit($id)->medenidurum) }}>BİLİNMİYOR</option>
							<option value="BEKAR"{{ selected('BEKAR', uye_edit($id)->medenidurum) }}>BEKAR</option>
							<option value="EVLİ"{{ selected('EVLİ', uye_edit($id)->medenidurum) }}>EVLİ</option>
							<option value="DUL"{{ selected('DUL', uye_edit($id)->medenidurum) }}>DUL</option>
							<option value="BOŞANMIŞ"{{ selected('BOŞANMIŞ', uye_edit($id)->medenidurum) }}>BOŞANMIŞ</option>
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
						<select name="il" id="il" class="form-control" >
							<option>SEÇİNİZ...</option>	
							@foreach(il() as $key)
							<option value="{{$key->id}}" {{selected($key->id,uye_edit($id)->i_il)}} >{{$key->adi}}</option>	
							@endforeach				
						</select>
					</div>

					<div class="col-6">
						<label class="form-label  ">*İLÇE</label>

						<select name="ilce" id="ilce" class="form-control"  >

							<option>ÖNCE İLİ SEÇİN...</option>
							@foreach(ilce() as $key)
							<option value="{{$key->id}}" {{selected($key->id,uye_edit($id)->i_ilce)}}>{{$key->adi}}</option>	
							@endforeach		
						</select>
					</div>

				</div>
			</div>
			<div class="mt-3">
				<label class="form-label  ">SEMT / KÖY</label>
				<input type="text" name="i_semt" value="{{uye_edit($id)->i_semt}}" class="form-control buyuk"  placeholder="VARSA SEMT ADI YADA KÖY ADI">
			</div>

			<div class="mt-3">
				<label class="form-label  ">*MAHALLE : </label>
				<input type="text" name="i_mh" value="{{uye_edit($id)->i_mh}}" class="form-control buyuk"   placeholder="SADECE MAHALLE ADINI YAZIN ">
			</div>

			<div class="mt-3">
				<label class="form-label  ">CADDE: </label>
				<input type="text" name="i_cd" id="" value="{{uye_edit($id)->i_cd}}"  class="form-control buyuk"  placeholder="VARSA SADECE CADDE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<label class="form-label  ">*SOKAK: </label>
				<input type="text" name="i_sk" id="" value="{{uye_edit($id)->i_sk}}"   class="form-control buyuk" placeholder="SADECE SOKAK ADINI YAZIN">
			</div>
			
			<div class="mt-3">
				<label class="form-label  ">SİTE ADI: </label>
				<input type="text" name="i_site" value="{{uye_edit($id)->i_site}}"   class="form-control buyuk" placeholder="VARSA OTURDUĞU SİTE ADINI YAZIN">
			</div>

			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label  ">BİNA NO</label>
						<input type="text" name="i_kapino" value="{{uye_edit($id)->i_kapino}}" class="form-control"  >  					
					</div>
					<div class="col-6">
						<label class="form-label">KAPI NO</label>
						<input type="text" name="i_daireno" value="{{uye_edit($id)->i_daireno}}" class="form-control" >
					</div>
				</div>
			</div>
			<div class="mt-3">
				<div class="row">
					<div class="col-6">
						<label class="form-label  ">Sabit Telefon</label>
						<input type="text" name="ev_tel" class="form-control"  value="{{uye_edit($id)->ev_tel}}" data-mask="(000) 000-00-00" data-mask-visible="true" placeholder="(000) 0000-0000" autocomplete="off">
					</div>
					<div class="col-6">
						<label class="form-label  ">Cep Telefon</label>
						<input type="text" name="gsm" class="form-control"  value="{{uye_edit($id)->gsm}}" data-mask="(500) 000-00-00" data-mask-visible="true" placeholder="(000) 0000-0000" autocomplete="off">
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
							<option value="EVET" {{selected(uye_edit($id)->calisiyormu, 'EVET')}}>EVET</option>
							<option value="HAYIR" {{selected(uye_edit($id)->calisiyormu, 'HAYIR')}}>HAYIR</option>
							<option value="EMEKLİ" {{selected(uye_edit($id)->calisiyormu, 'EMEKLİ')}}>EMEKLİ</option>
						</select>				
					</div>					
				</div>
				<div class="col-6">
					<div id="meslek">
						<div class="mt-3" >
							<label class="form-label ">MESLEĞİ: </label>				
							<input type="text" name="meslegi"  value="{{uye_edit($id)->meslegi}}" id="meslek"  class="form-control meslek"  >
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
							<input class="form-check-input" type="radio" name="s_guvence" {{checked(uye_edit($id)->s_guvence, 'BİLİNMİYOR')}} value="BİLİNMİYOR">
							<span class="form-check-label">BİLİNMİYOR</span>
						</label>
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="s_guvence"  value="SGK" {{checked(uye_edit($id)->s_guvence, 'SGK')}}>
							<span class="form-check-label">SGK (SSK, EMEKLİ SANDIĞI, BAĞKUR)</span>
						</label>
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="s_guvence"  value="GSS" {{checked(uye_edit($id)->s_guvence, 'GSS')}}>
							<span class="form-check-label">GSS (YEŞİLKART, 2022)</span>
						</label>      			
					</div>					
				</div>
				<div class="col-5">
					<div class="mt-3">
						<label class="form-label ">ENGELİN OLUŞ SEBEBİ</label>
						@foreach(eosList() as $key)
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="eos[]" value="{{$key->id}}" {{checked($key->id, uye_edit($id)->eos, 1)}}>
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
					<input type="checkbox" class="form-check-input"  name="engl_grubu[]" value="{{$key->id}}"{{checked($key->id,uye_edit($id)->engl_grubu,1)}}>
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
								<option value="{{$i}}" {{selected($i,uye_edit($id)->engl_svy)}} >{{$i}}</option>
								@endfor
							</select>                              
							<span class="input-group-text">%</span>
						</div>
					</div>
					<div class="col-6">
						<label class="form-label ">ENGELLİ İLE YAKINLIĞI</label>
						<input type="text" name="engl_yakinligi" value="{{uye_edit($id)->engl_yakinligi}}" class="form-control buyuk">
					</div>
				</div>      				
			</div>
			<div class="mt-3 ">
				<label class="form-label ">ENGEL SEBEBİ</label>
				<textarea class="form-control" name="engl_sebebi" rows="6">{{uye_edit($id)->engl_sebebi}}</textarea>
			</div>
			<div class="mt-3 ">
				<label class="form-label ">ENGEL AÇIKLAMASI</label>
				<textarea class="form-control" name="engl_aciklamasi" rows="6">{{uye_edit($id)->engl_aciklamasi}}</textarea>
			</div>      			
		</div>
	</div>

	<div class="card mt-2" id="diger_bilgiler" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title">Diğer Bilgiler</h4></div>
		<div class="card-body">
			<div class="mt-3">
				<label class="control-label">İLGİL ALANLARI: </label>
				<textarea name="ilgialani"  class="form-control" rows="5">{{uye_edit($id)->ilgialani}}</textarea>
			</div>

			<div class="mt-3">
				<label class="control-label">NOT: </label>
				<textarea name="not" class="form-control" rows="5">{{uye_edit($id)->notlar}}</textarea>				
			</div>

			<div class="mt-3">
				<label class="form-label">OKUYORMU</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="EVET" {{checked(uye_edit($id)->okuyormu, 'EVET')}}>
					<span class="form-check-label">EVET</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="HAYIR" {{checked(uye_edit($id)->okuyormu, 'HAYIR')}}>
					<span class="form-check-label">HAYIR</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="okuyormu" value="TERK" {{checked(uye_edit($id)->okuyormu, 'TERK')}}>
					<span class="form-check-label">TERK</span>
				</label>
			</div>

			<div class="mt-3">
				<label class="form-label">ÖĞRENIM DURUMU</label>
				<select name="ogrenimdurumu" class="form-select">
					<option value="">SEÇİNİZ...</option>
					@foreach(ogrenimdurumu() as $key)
					<option value="{{$key->id}}" {{selected($key->id,uye_edit($id)->ogrenimdurumu)}}>{{$key->name}}</option>
					@endforeach
				</select> 
			</div>

			<div class="mt-3">
				<label class="form-label">ALDIĞI YARDIMLAR</label>

				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="aldigiYardim" value="2022" {{checked('2022',uye_edit($id)->aldigiYardim,1)}}>
					<span class="form-check-label">2022</span>
				</label>
				<label class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" name="aldigiYardim" value="Evde Bakım" {{checked('Evde Bakım',uye_edit($id)->aldigiYardim,1)}}>
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
					<input type="text" name="resim" value="0" class="form-control">
				</div>
				<div class="col-6">
					
					<label class="form-label">Getirilen Evraklar</label>
						@foreach(evrak() as $key)
					<label class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="evrak[]" {{checked($key->id,uye_edit($id)->evrak,1)}}
						value="{{$key->id}}">
						<span class="form-check-label">{{$key->name}}</span>
					</label>
					@endforeach
				
						

				</div>
				<div class="col-5">
					<label  class="form-label">Talepler</label>
					{[$array = explode(',',uye_edit($id)->talep);]}
					<select name="talep[]" class="form-select" multiple multiselect-search="true" multiselect-select-all="true">

					@foreach(talep() as $key)
						<option value="{{$key->id}}" {{in_array($key->id,$array) == true?'selected':''}}>{{$key->adi}}</option>
					@endforeach
					</select>

				</div>
			</div>		

		</div>
	</div>
	<div class="mt-3">
		<input type="hidden" name="id" value="{{$id}}">
	<button type="submit" class="btn btn-primary" style="width:100%">Güncelle</button>
	</div>
</form>
