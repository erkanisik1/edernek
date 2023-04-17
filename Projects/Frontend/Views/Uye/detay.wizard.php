<input type="button" value="Geri Dön!" onClick="javascript:history.go(-1)" />




<!-- Üye Bilgileri -->
<div class="card mt-2">
	<div class="card-header">
		<div class="card-title"><i class="fa fa-user"></i> Üye Bilgileri</div>
	</div>
	<div class="table-responsive">			
		<table class="table table-vcenter"> 
			<thead class="text-center">
				<tr>
					<th>ÜYE NO</th>
					<th>TC NO</th>
					<th>ADI SOYADI</th>
					<th>ADRESİ</th>
					<th>TELEFON</th>
					<th>ENGELİ</th>						
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{uye($id)->uyeno }}</td>
					<td>{{uye($id)->tcno }}</td>
					<td>{{uye($id)->adi.' '.uye($id)->soyadi.' ('.yasi(uye($id)->dtarih).')'; }}</td>
					<td>{{evadresi(uye($id)->id); }}</td>
					<td>{{uye($id)->ev_tel.' '.uye($id)->gsm  }}</td>
					<td>{{uye($id)->engl_grubu.' / '.uye($id)->engl_aciklamasi; }}</td>
				</tr>
			</tbody>
		</table>
	</div>		
</div>
<!-- Aidat Bilgileri -->
<div class="card mt-2">
	<div class="card-header">
		<div class="card-title"><i class="fa fa-bars"></i> Aidat Bilgileri</div>
	</div>
	<div class="table-responsive">			
		<table class="table table-vcenter"> 
			<thead class="text-center">
				<tr>
					<th title="Makbuz Kesim Ta">M.K TARİH</th>
					<th>MAKBUZ NO	</th>
					<th>MAKBUZU KESEN</th>
					<th>AİDAT YILI</th>
					<th>AİDAT ÜCRETİ</th>
				</tr>
			</thead>
			<tbody>
			@foreach (aidat($id) as $key )
				<tr>
					<td>{{tarih($key->mkt,'-') }}</td>
					<td>{{$key->mno }}</td>
					<td>{{$key->mkesen; }}</td>
					<td>{{$key->ay; }}</td>
					<td>{{$key->au;  }}</td>						
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>		
</div>

<!-- ayniyat Bilgileri -->

<div class="card mt-2">
	<div class="card-header">
		<div class="card-title"><i class="fa fa-user"></i> Ayniyat Çıkış Bilgileri</div>
	</div>
	<div class="table-responsive">			
		<table class="table table-vcenter table-striped"> 
			<thead class="text-center">			
				<tr>
					<th width="10" class="center">SN</th>
		            <th width="80" class="center">Teslim Tarihi</th>
		            <th width="100" class="center">Koçan / Makbuz</th>
		            <th width="200" class="center">Teslim Alan</th>
		            <th width="200" class="center">Teslim Eden</th>
		            <th colspan="5" class="center">Açıklama</th>
		            <th width="50" class="center">Miktarı</th>
		            <th width="50" class="center">Birim</th>
				</tr>
			</thead>
			<tbody>
			@foreach (aytb($id) as $key )
			@foreach (aytbList($key->id) as $key1 )
				<tr>
	                <td class="center">{{$key1->sirano }}</td>
	                <td class="center">{{tcevir($key->ttarih) }}</td>
	                <td class="center">{{$key->kocanno.' / '.$key->msira; }}</td>
	                <td>{{$key->talan; }}</td>
	                <td>{{$key->teden; }}</td>
	                <td colspan="5">
	                	@if ($key1->aciklama) 
						{[$aciklama = $key1->mcinsi.' / '.$key1->aciklama]}
						@else
						{[$aciklama = $key1->mcinsi]}
						@endif

	                    {{$aciklama}}
	                </td>
	                <td class="center">{{$key1->adet; }}</td>
	                <td class="center">{{$key1->birim; }}</td>
	             </tr>
	            @endforeach
			</tbody>
		@endforeach
		</table>
	</div>		
</div>

