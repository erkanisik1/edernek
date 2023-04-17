<form action="" method="post">
<div class="card">
	<div class="card-header">
		<div class="card-title"><i class="fa fa-user"></i> Üye Arama</div>
	</div>
	<div class="table-responsive">
				<table class="table table-vcenter">
					<thead>
						<tr>
							<th>Üye No</th>
							<th>Adı Soyadı</th>
							<th>Engel Grubu</th>
							<th>İl</th>
							<th>İlçe</th>
							<th>Hastalığı</th>
							<th>Üye Durumu</th>
							<th>Üyelik Türü</th>
							<th>Talepler</th>
							<th class="w-1"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input type="text" name="uyeno" class="form-control">
							</td>
							<td>
								<select name="uyeadi" id="select2" class="form-select" onchange="submit();">
									<option value="">Seçiniz...</option>
									@foreach (uyeList() as $key)
										<option value="{{$key->id}}">{{$key->isim.' - '.$key->i_mh.' MAH.'}}</option> 
									@endforeach
								</select>
							</td>
							<td>
								<select name="engelgrubu" id="" class="form-select">
									<option value="">Seçiniz...</option>
									<option value="BEDENSEL">BEDENSEL</option>
									<option value="ZİHİNSEL">ZİHİNSEL</option>
									<option value="İŞİTME">İŞİTME / DUYMA</option>
									<option value="GÖRME">GÖRME</option> 
									<option value="HASTALIK">HASTALIK</option>
									<option value="SÜREĞEN HASTALIK">SÜREĞEN HASTALIK</option>
								</select>
							</td>
							<td>
								<select name="il" class="form-select">
									<option value="">Seçiniz...</option>
									@foreach (il_select() as $key )
										<option value="{{$key->i_il}}">{{$key->i_il}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="ilce" class="form-select">
									<option value="">Seçiniz...</option>
									@foreach (ilce_select() as $key )
										<option value="{{$key->i_ilce}}">{{$key->i_ilce}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="engl_aciklamasi" id="select1" class="form-select">
									<option value="">Seçiniz...</option>
									@foreach (engel_aciklamasi() as $key)
										<option value="{{$key->engl_aciklamasi}}">{{$key->engl_aciklamasi}}</option>
									@endforeach
								</select>
							</td>
							<td>
								<select name="uyedurumu" id="" class="form-select">
									<option value="">SEÇİNİZ</option>
									<option value="AKTİF" >AKTİF</option>
									<option value="ONAY BEKLİYOR">ONAY BEKLİYOR</option>
									<option value="VEFAT">VEFAT</option>
									<option value="AYRILDI">AYRILDI</option>
									<option value="ÇIKARILDI">ÇIKARILDI</option>
								</select>
							</td>
							<td>
								<select name="uyetur"  class="form-select" >
									<option value="">Seçiniz...</option> 
									<option value="ENGELLİ ÜYE">ENGELLİ ÜYE</option>
									<option value="SAĞLAM ÜYE">SAĞLAM ÜYE</option>
									<option value="ENGELLİ VASİSİ">ENGELLİ VASİSİ</option>
									<option value="ÜYE DEĞİL">ÜYE DEĞİL</option>
									<option value="GONULLU">GÖNÜLLÜ</option>					
								</select>
							</td>
							<td>
								<select name="talep" id="select3" class="form-select"> 
									<option value="0">Seçiniz</option>
									@foreach (talep() as $key)
										<option value="{{$key->adi}}">{{$key->adi}}</option>
									@endforeach
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="9">
								<button type="submit" class="btn btn-primary form-control">Ara</button>
								</td>
							</tr>
						</tbody>
					</table>
</div>


	</form>