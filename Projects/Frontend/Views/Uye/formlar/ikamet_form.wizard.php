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