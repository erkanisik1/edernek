
		<form action="/aidat/detay" method="POST" >
				<div class="card mt-2" id="kimlik_bilgileri" >
		<div class="card-header bg-dark bg-gradient text-white"><h4 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> ÜYE AİDAT ARAMA FORMU</h4></div>
		<div class="card-body">
			<div class="row">
				<div class="col-1">
					<label class="form-label">Üye No</label>
					<input type="text" name="uyeno" class="form-control">
				</div>
				<div class="col-11">
					<label class="form-label">Adı Soyadı</label>
					<select name="uyeid" id="select2" class="form-select" >
								<option value="0">Seçiniz...</option> 
								@foreach (uyeList() as $key)
										<option value="{{$key->id}}">{{$key->isim.' - '.$key->i_mh.' MAH.'}}</option> 
									@endforeach
							</select> 
					
				</div>
			</div>
			<div class="mt-2">
				<button type="submit" class="btn btn-block btn-primary">ARA</button>
			</div>
		</div>
	</div>
		</form>
