@cardStart('AİDAT GİRİŞ FORMU')

<form action="" method="post">
	
	<table class="table table-bordered table-striped">
				<thead class="text-center">
					<tr>
						<th>MAKBUZ KESİM TARİH</th>
						<th>MAKBUZ NO</th>
						<th>MAKBUZU KESEN</th>
						<th>AİDAT YILI</th>
						<th>AİDAT ÜCRETİ</th>
					</tr>
				</thead>
				<tbody>
					<tr class="odd gradeX">
						<td><input type="date" name="mkt" class="form-control"></td>
						<td><input type="text" name="mn" class="form-control"></td>
						<td>
						<select name="mk" id="" class="form-select">
							<optgroup label="Aktif Yönetim Kurulu">
							<option value="">Seçiniz...</option>
							@foreach (yonetim() as $key)
								<option value="{{$key->adi}}">{{$key->adi}}</option>
							@endforeach 
							</optgroup>
							
							<optgroup label="Pasif Yönetim Kurulu">
							@foreach (yonetim('0') as $key)
								<option value="{{$key->adi}}">{{$key->adi}}</option>
							@endforeach
							</optgroup>
						</select>
					
					</td>
						<td><input type="text" name="ay" class="form-control" value="{{gmdate('Y')}} 	"></td>
						<td>
							<div class="input-icon">
								
							<input type="text" name="au" class="form-control" value="60">
							<span class="input-icon-addon">₺</span> </td>
							</div>
					</tr>
					<tr>
					<td colspan="5">
						<input type="hidden" name="islem" value="aidatkaydet">
						<input type="hidden" name="uyeno" value="{{uye_bilgi($id)->uyeno}} ">
						<button class="btn btn-primary btn-block">AİDAT KAYDET</button></td>
					</tr>
				</tbody>
			</table>
</form>

@cardEnd()


<div class="row">
	<div class="col-5">
		@cardStart('ÜYE BİLGİLERİ')

		<table class="table table-vcenter table-bordered table-striped">
			<tr>
				<td>ÜYE NO</td>
				<td>{{uye_bilgi($id)->uyeno}}</td>
			</tr>
			<tr>
				<td>ADI SOYADI</td>
				<td >{{uye_bilgi($id)->adi.' '.uye_bilgi($id)->soyadi}}</td>
			</tr>
			<tr>
				<td>TC NO</td>
				<td >{{uye_bilgi($id)->tcno}}</td>
			</tr>
			<tr>
				<td>ADRESİ</td>
				<td >{{uye_bilgi($id)->evadres}}</td>
			</tr>
			<tr>
				<td>ÜYELİK TARİHİ</td>
				<td >{{tcevir(uye_bilgi($id)->ubt)}}</td>
			</tr>
			<tr>
				<td>ÜYELİK TİPİ</td>
				<td>{{uyeturName(uye_bilgi($id)->uyetur)}}</td>
			</tr>
		</table>
		@cardEnd()
		
	</div>
	<div class="col-7">
		@cardStart('AİDAT LİSTESİ')
		<div class="table-responsive">
		<table class="table table-bordered table-vcenter table-striped">
				<thead class="text-center">
					<tr>
						<th>MAKBUZ KESİM TARİH</th>
						<th>MAKBUZ NO</th>
						<th>MAKBUZU KESEN</th>
						<th>AİDAT YILI</th>
						<th>AİDAT ÜCRETİ</th>
						<th>İŞLEMLER</th>
					</tr>
				</thead>
				<tbody>
					@foreach (aidat(uye_bilgi($id)->uyeno) as $key)
						<tr>
							<td class="text-center">{{tcevir($key->mkt)}}</td>
							<td class="text-center">{{$key->mno ]}</td>
							<td>{{$key->mkesen ]}</td>
							<td class="text-center">{{$key->ay ]}</td>
							<td class="text-center">{{$key->au.' TL' ]}</td>
							<td class="text-center">
								<a href="/aidat/edit/{{$key->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a>
								<a href="/aidat/delete/{{$key->id}}" onclick="return window.confirm('Bu kaydı silmek istediginden emimisin');"><i class="fa fa-trash" aria-hidden="true"></i></a>								
							</td>	
						</tr> 
					@endforeach
				</tbody>
			</table>
		</div>
		@cardEnd()

	</div>
</div>