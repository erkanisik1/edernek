
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"> <i class="fa fa-id-card-o"></i> </span>
			<h5>ÜYE KİMLİK BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">
			<div class="control-group">
				<label class="control-label">MÜRACAAT TARİHİ</label>
				<div class="controls">
					<input type="date" class="span5" name="mtarih" id="mtarih" value="" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}">
					<input type="text" name="tcno" value="" id="tcno" maxlength="5"  class="span6" pattern="[0-9]{11}" title="TC NUMARASI 11 RAKAMDAN AZ OLAMAZ" required placeholder="TC NUMARASINI YAZIN..." >
				</div>
			</div>

		
			<div class="control-group">
				<label class="control-label">*ADI SOYADI: </label>
				<div class="controls">
					<input type="text" name="adi" id=""  class="span5" value="" onkeypress="return BuyukHarf(event);"  required placeholder="ADINI YAZIN...">
					<input type="text" name="soyadi" id=""  class="span6" value="" onkeypress="return BuyukHarf(event);"  required placeholder="SOYADINI YAZIN">
				</div>
			</div>

			
			

			<div class="control-group">
				<label class="control-label">BABA ADI: </label>
				<div class="controls">
					<input type="text" name="babaadi" id="" value="" class="span5" onkeypress="return BuyukHarf(event);" placeholder="BABA ADINI YAZIN..." >
					<input type="text" name="anneadi" id="" value="" class="span6" onkeypress="return BuyukHarf(event);" placeholder="ANNE ADINI YAZIN" >

				</div>
			</div>


			<div class="control-group">
				<label class="control-label">DOĞUM TARİHİ: </label>
				<div class="controls">
					<input type="date" name="dtarih" id="dstarih" value="" class="span4" > 
					<input type="text" name="dogumyeri" id="" value=""  class="span4" onkeypress="return BuyukHarf(event);" placeholder="DOĞUM YERİNİ YAZIN..." >  
					<input type="text" name="kutuk" id="" value="" class="span3" onkeypress="return BuyukHarf(event);" placeholder="KÜTÜK İL / İLÇE YAZINIZ..." >
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">*CİNSİYETİ: </label>
				<div class="controls">

					<select name="cinsiyeti" id="" required class="span4"> 
						<option value="">SEÇİNİZ....</option>
						<option value="KADIN">KADIN</option>
						<option value="ERKEK" >ERKEK</option>
					</select>  
					<select name="kangrubu" class="span4">
						<option value="">KAN GURUBUNU SEÇİNİZ...</option>
						<option value="BİLİNMİYOR">BİLİNMİYOR</option>
						<option value="A - RH">A - RH</option>
						<option value="A + RH">A + RH</option>
						<option value="B - RH">B - RH</option>
						<option value="B + RH">B + RH</option>
						<option value="AB - RH">AB - RH</option>
						<option value="AB + RH">AB + RH</option>
						<option value="0 - RH">0 - RH</option>
						<option value="0 + RH" >0 + RH </option>
					</select> 
					<select name="medenidurum" class="span3">
						<option value="">MEDENİ DURUMUNU SEÇİNİZ...</option>
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