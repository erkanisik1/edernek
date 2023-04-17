@cardStart('ÜYE BİLGİLERİ')
<div class="table-responsive">
	<table class="table table-bordered table-striped table-vcenter">
		<thead class="text-center">			
		<tr>
			<th>ÜYE NO</th>
			<th>ADI SOYADI</th>
			<th>TC NO</th>
			<th>YERLEŞİM YERİ</th>
			<th>ÜYELİK TARİHİ</th>
			<th>ÜYELİK TİPİ</th>
		</tr>
		</thead>
		<tbody>
			
		<tr>
			<td>{{$uyebilgi->uyeno}}</td>
			<td>{{$uyebilgi->isim}}</td>
			<td>{{$uyebilgi->tcno}}</td>
			<td>{{$uyebilgi->evadres}}</td>
			<td>{{tcevir($uyebilgi->ubt)}}</td>
			<td>{{$uyebilgi->uyetur}}</td>
		</tr>
		</tbody>
	</table>
</div>
@cardEnd()
@cardStart('AİDAT DÜZENLEME FORMU')

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
						<td><input type="date" name="mkt" value="{{$edit->mkt}}" class="form-control"></td>
						<td><input type="text" name="mno" value="{{$edit->mno}}" class="form-control"></td>
						<td>
						<select name="mkesen" id="" class="form-select">
							<optgroup label="Aktif Yönetim Kurulu">
							<option value="">Seçiniz...</option>
							@foreach (yonetim() as $key)
								<option value="{{$key->adi}}" {{selected($key->adi,$edit->mkesen)}}>{{$key->adi}}</option>
							@endforeach 
							</optgroup>
							
							<optgroup label="Pasif Yönetim Kurulu">
							@foreach (yonetim('0') as $key)
								<option value="{{$key->adi}}">{{$key->adi}}</option>
							@endforeach
							</optgroup>
						</select>
					
					</td>
						<td><input type="text" name="ay" class="form-control" value="{{$edit->ay}}"></td>
						<td>
							<div class="input-icon">
								
							<input type="text" name="au" class="form-control" value="{{$edit->au}}">
							<span class="input-icon-addon">₺</span> </td>
							</div>
					</tr>
					<tr>
					<td colspan="5">
						<input type="hidden" name="id" value="{{$edit->id}}">
						<input type="hidden" name="uyeno" value="{{$uyebilgi->uyeno}}">
						<button class="btn btn-primary btn-block">AİDAT GÜNCELLE</button></td>
					</tr>
				</tbody>
			</table>
</form>

@cardEnd()