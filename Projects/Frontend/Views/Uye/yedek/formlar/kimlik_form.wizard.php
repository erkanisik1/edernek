
	<div class="widget-box" id="kimlik" style="display:none;">
		<div class="widget-title"> <span class="icon"> <i class="icon icon-info-sign"></i> </span>
			<h5>ÜYE KİMLİK BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">

			<div class="control-group">
				<label class="control-label">*TC	NO: </label>
				<div class="controls">
					<input type="text" name="tcno" value="" id="tcno" maxlength="11"  class="span11" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required >

				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*ADI: </label>
				<div class="controls">
					<input type="text" name="adi" id=""  class="span11" value="" onkeypress="return BuyukHarf(event);"  required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*SOYADI: </label>
				<div class="controls">
					<input type="text" name="soyadi" id="" value=""  class="span11" onkeypress="return BuyukHarf(event);" required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">BABA ADI: </label>
				<div class="controls">
					<input type="text" name="babaadi" id="" value="" class="span11" onkeypress="return BuyukHarf(event);"  >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">ANNE ADI: </label>
				<div class="controls">
					<input type="text" name="anneadi" id="" value="" class="span11" onkeypress="return BuyukHarf(event);" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">DOĞUM TARİHİ: </label>
				<div class="controls">
					<input type="date" name="dtarih" id="dstarih" value="" class="span11" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">DOĞUM YERİ: </label>
				<div class="controls">
					<input type="text" name="dogumyeri" id="" value=""  class="span11" onkeypress="return BuyukHarf(event);" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">KÜTÜK İL / İLÇE: </label>
				<div class="controls">
					<input type="text" name="kutuk" id="" value="" class="span11" onkeypress="return BuyukHarf(event);" >
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*CİNSİYETİ: </label>
				<div class="controls">

					<select name="cinsiyet" id="" required>
						<option value="">SEÇİNİZ....</option>
						<option value="KADIN">KADIN</option>
						<option value="ERKEK" >ERKEK</option>
					</select> KAN GURUBU 
					<select name="kangrubu">
						<option value="">SEÇİNİZ...</option>
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="A - RH">A - RH</option>
						<option value="A + RH">A + RH</option>
						<option value="B - RH">B - RH</option>
						<option value="B + RH">B + RH</option>
						<option value="AB - RH">AB - RH</option>
						<option value="AB + RH">AB + RH</option>
						<option value="0 - RH">0 - RH</option>
						<option value="0 + RH" >0 + RH </option>
					</select> MEDENİ DURUMU 
					<select name="medenidurum">
						<option value="">SEÇİNİZ...</option>
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="BEKAR" >BEKAR</option>
						<option value="EVLİ">EVLİ</option>
						<option value="DUL">DUL</option>
						<option value="BOŞANMIŞ">BOŞANMIŞ</option>
					</select>

				</div>
			</div>




		</div>
	</div> 