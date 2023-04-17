<div class="card mt-2" id="kimlik_bilgileri" >
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