	<div class="widget-box" >
		<div class="widget-title"> <span class="icon"> <i class="fa fa-address-card-o"></i> </span>
			<h5>ÜYE İKAMET BİLGİLERİ</h5>
		</div>
		<div class="widget-content nopadding">

			<div class="control-group">
				<label class="control-label">*İL : </label>
				<div class="controls">
					<select name="i_il" id="il" class="span11" required>
						<option>SEÇİNİZ...</option>
						<?php foreach (il_select_list() as $key): ?>
							<option value="<?php echo $key->CityID ?>"><?php echo $key->CityName ?></option>
						<?php endforeach ?>
					</select> 
					
				</div>
			</div>


			<div class="control-group">
				<label class="control-label">*İLçe : </label>
				<div class="controls">
				<select name="i_ilce" id="ilce" class="span11" required >
						<option>ÖNCE İLİ SEÇİN...</option>
					</select>
					
				</div>
			</div>


			<div class="control-group">
				<label class="control-label">SEMT / KÖY: </label>
				<div class="controls">
					<input type="text" name="i_semt_koy" value="" class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA SEMT ADI YADA KÖY ADINI YAZIN..">
				</div>
			</div> 

			<div class="control-group">
				<label class="control-label">*MAHALLE : </label>
				<div class="controls">
					<input type="text" name="i_mh" value="" class="span11" onkeypress="return BuyukHarf(event);" required placeholder="MAHALLE ADINI YAZIN.... ">
				</div>
				
			</div>
			

			<div class="control-group">
				<label class="control-label">CADDE: </label>
				<div class="controls">
					<input type="text" name="i_cd" id="" value=""  class="span11" onkeypress="return BuyukHarf(event);" placeholder="VARSA CADDE ADINI YAZIN">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">* SOKAK: </label>
				<div class="controls">
					<input type="text" name="i_sk" id="" value="" required onkeypress="return BuyukHarf(event);" class="span11" placeholder="SOKAK ADINI YAZIN...">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">SİTE ADI: </label>
				<div class="controls">
					<input type="text" name="i_site" value="" id="" onkeypress="return BuyukHarf(event);" class="span11" placeholder="VARSA SİTE ADI YADA APARTMAN ADINI YAZIN...">
				</div>
			</div>

			
			<div class="control-group">
				<label class="control-label">*BİNA NO: </label>
				<div class="controls">
					<input type="text" name="i_kapino" class="span5" required placeholder="BİNA NUMARISINI YAZIN..." > *DAİRE NO: 
					<input type="text" name="i_daireno" class="span5" placeholder="DAİRE KAPI NUMARISINI YAZIN..." required>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">TELEFON 1: </label>
				<div class="controls">
					<input type="text" name="ev_tel[]" class="span5" id="tel1" placeholder="VARSA EV TELEFONUNU YAZIN" > TELEFON 2:  
					<input type="text" name="ev_tel[]" class="span5" id="tel2"  placeholder="VARSA 2.EV TELEFONUNU YAZIN">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label">*CEP TELEFON: </label>
				<div class="controls">
					<input type="text" name="gsm[]" id="tel3" class="span5" placeholder="VARSA CEP TELEFONUNU YAZIN..." required> CEP TELEFON 2:  
					<input type="text" name="gsm[]" id="tel4" class="span5" placeholder="VARSA 2.CEP TELEFONUNU YAZIN..." >
				</div>
			</div>

		</div>
	</div>