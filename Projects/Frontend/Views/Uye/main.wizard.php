<!-- Arama formu -->
@view('Uye/formlar/uye_sorgulama_formu')
<!-- Arama formu sonu -->




@if(isset($uyebilgi)) 
<div class="card mt-2">
	<div class="card-header">
		<div class="card-title"><i class="fa fa-user"></i> Üye Bilgi</div>
	</div>

	<div class="table-responsive">
		<table class="table table-vcenter">
			<thead>
				<tr class="text-center">

					<th >ÜYE NO</th>
					<th >KAYIT TARİHİ</th>
					<th >ÜYELİK TİPİ</th>
					<th >TC NO</th>
					<th>ÜYE ADI SOYADI</th>
					<th>ADRESİ</th>
					<th>TELEFONLARI</th>
					<th width="18%" >İŞLEMLER</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($uyebilgi as $key)

				<tr>

					<td >{{ $key->uyeno }}</td>
					<td >{{ tcevir($key->mtarih); }}</td>
					<td >{{ uyeturName($key->uyetur) }}</td>
					<td >{{ $key->tcno }}</td>
					<td>{{ $key->adi.' '.$key->soyadi.' ( '.yasi($key->dtarih).' )'; }}</td>
					<td>{{ evadresi($key->id) }}</td>
					<td >{{ $key->ev_tel.' '.$key->gsm }}</td>
					<td>
						<a href="uye/duzenle/{{$key->id}}" class="btn btn-primary"  data-bs-toggle="tooltip" data-bs-placement="top" title="DÜZENLEME FORMU">
							<i class="fa fa-edit"></i>
						</a>

						<a href="uye/detay/{{$key->id}}" class="btn btn-success"  data-bs-toggle="tooltip" data-bs-placement="top" title="DETAY FORMU ( ÜYEYE AİT TÜM İŞLEMLERİN GÖRÜLDÜĞÜ SAYFADIR )">
							<i class="fa fa-book"></i>
						</a>

						<a href="uye/uyelikformu/{{$key->id}}" class="btn btn-info"  data-bs-toggle="tooltip" data-bs-placement="top" title="ÜYELİK FORMU">
							<i class="fa fa-bars"></i>
						</a>

						<a href="makbuz/aytb_cikis/{{$key->id}}" class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="top" title="AYNİ MAKBUZ ÇIKIŞI">
							<i class="fa fa-eject"></i>
						</a>

					</td>	


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>



@endif